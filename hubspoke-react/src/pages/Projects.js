// src/pages/Projects.js
import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import Breadcrumbs from "../components/common/Breadcrumbs";
import LoadingSpinner from "../components/common/loadingSpinner";
import ProjectList from "../components/projects/ProjectList";

import { API_PATH, ACCESS_TOKEN, safeJsonParse} from "../config";

const PROJECTS_URL = `${API_PATH}/get-projects.php`

export default function Projects() {
    const [projects, setProjects] = useState(null);
    const [loading, setLoading] = useState(true);
    const [loadingText, setLoadingText] = useState("Loading Projects");
    const [error, setError] = useState(null);
  
  function fetchProjects() {
    setLoading(true);
    setError("");

    fetch(`${API_PATH}/get-projects.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Authorization": `Bearer ${ACCESS_TOKEN}`,
      },
    })
      .then((res) => res.json())
      .then((data) => {
        //console.log(data); 
        if (data && data.projects) {
          setProjects(data.projects);
        } else {
          setError("No projects found.");
        }
        setLoading(false);
      })
      .catch((err) => {
        console.error("Error:", err);
        setError("Failed to load projects.");
        setLoading(false);
      });
  }
  
  useEffect(() => {
    // console.log(ACCESS_TOKEN);
    fetchProjects();
  }, []); 

      if (error) return <div style={{ color: "red" }}>Error: {error}</div>;
  
      if (loading) {
          return <LoadingSpinner message={loadingText} />;
      }

  return (
    <div style={{ padding: "20px" }}>
      <Breadcrumbs />
      <ProjectList projects={projects}></ProjectList>
    </div>
  );
}