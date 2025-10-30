// src/pages/IR.js
import React from "react";
import { useParams } from "react-router-dom";
import Breadcrumbs from "../components/common/Breadcrumbs";

export default function IR() {
  const { projectId } = useParams();
  return (
    <div style={{ padding: "20px" }}>
      <Breadcrumbs />
      <h2>Information Architecture</h2>
      <p>Showing IR for Project {projectId}</p>
    </div>
  );
}
