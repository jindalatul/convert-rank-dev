import React, { useEffect, useState } from "react";
import { Link,useNavigate } from 'react-router-dom';

import "./ProjectList.css";

function ProjectList({projects}) {

  console.log(projects)
  const navigate = useNavigate();

  function handleDelete(id) {
    if (window.confirm("Delete this project?")) {
      console.log(id);
    }
  }
  function handleAddProject()
  {
    navigate('/onboarding');
  }
  return (
    <div className="project-list-container">
        <div className="project-grid">
          <div className="project-card">
            <button name="add-project" className="create-project-button" 
                    onClick={handleAddProject}>Create New Project</button>
          </div>
          {projects.map((project) => (
            <div key={project.id} className="project-card">
              <h3 className="project-name">
                <Link to={`/projects/${project.id}/keywords`}>{project.name}</Link>
              </h3>

              <p className="status">
                <strong>Status:</strong> {project.status}
              </p>
              <p className="updated">
                <strong>Last Updated:</strong> {project.updated}
              </p>

              <div className="card-actions-bottom">
                <Link to={`/projects/${project.id}/keywords`} className="icon-btn" title="Open">
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
    </div>
  );
}

export default ProjectList;
