import React, { useEffect, useState } from "react";
import { Link,useNavigate } from 'react-router-dom';


import "./ProjectList.css";

import { API_PATH, ACCESS_TOKEN} from "../../config";

// console.log(API_PATH);

function ProjectList() {
  const [projects, setProjects] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");

  const navigate = useNavigate();

  useEffect(() => {
    // console.log(ACCESS_TOKEN);
    fetchProjects();
  }, []);

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

  function handleDelete(id) {
    if (window.confirm("Delete this project?")) {
      setProjects(projects.filter((p) => p.id !== id));
    }
  }
  function handleAddProject()
  {
    navigate('/onboarding');
  }
  return (
    <div className="project-list-container">
      <h2 className="heading">My Projects</h2>

      {error && <p className="error-text">{error}</p>}

      {loading ? (
        <p>Loading projects...</p>
      ) : (
        <div className="project-grid">
          <div className="project-card">
            <button name="add-project" className="create-project-button" 
                    onClick={handleAddProject}>Create New Project</button>
          </div>
          {projects.map((project) => (
            <div key={project.id} className="project-card">
              <h3 className="project-name">
                <Link to={`/dashboard/${project.id}`}>{project.name}</Link>
              </h3>

              <p className="status">
                <strong>Status:</strong> {project.status}
              </p>
              <p className="updated">
                <strong>Last Updated:</strong> {project.updated}
              </p>

              <div className="card-actions-bottom">
                <Link to={`/dashboard/${project.id}`} className="icon-btn" title="Open">
                  ↗
                </Link>
                <button
                  className="icon-btn danger"
                  title="Delete"
                  onClick={() => handleDelete(project.id)}
                >
                  🗑️
                </button>
              </div>
            </div>
          ))}
        </div>
      )}
    </div>
  );
}

export default ProjectList;
