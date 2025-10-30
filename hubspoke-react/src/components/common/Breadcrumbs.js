// src/components/Breadcrumbs.js
import React from "react";
import { Link, useParams, useLocation } from "react-router-dom";
import "./breadcrumbs.css";

export default function Breadcrumbs() {
  const { projectId } = useParams();
  const { pathname } = useLocation();

  // Determine which section is active from the URL
  const activeKey =
    pathname.includes("/ir") ? "ir" :
    pathname.includes("/keywords") ? "keywords" :
    pathname.includes("/persona") ? "persona" :
    null;

  // Always show the full path for a project
  const steps = [
    { key: "projects", label: "Projects", to: "/projects" },
    ...(projectId
      ? [
          { key: "persona", label: "Persona", to: `/projects/${projectId}/persona` },
          { key: "keywords", label: "Keywords", to: `/projects/${projectId}/keywords` },
          { key: "ir", label: "Information Architecture", to: `/projects/${projectId}/ir` },
        ]
      : []),
  ];

  return (
    <nav aria-label="Breadcrumb" className="breadcrumbs-nav">
      {steps.map((s, i) => {
        const isLast = i === steps.length - 1;
        const isActive = s.key === activeKey || (!projectId && s.key === "projects");

        return (
          <span key={s.key} style={{ whiteSpace: "nowrap" }}>
            {i > 0 && <span style={{ margin: "0 8px", color: "#9CA3AF" }}>›</span>}
            {isActive || isLast && s.key !== "projects" && activeKey === null ? (
              <span style={{ fontWeight: 600, color: "#111827" }}>{s.label}</span>
            ) : (
              <Link to={s.to} style={{ color: "#2563eb", textDecoration: "none" }}>
                {s.label}
              </Link>
            )}
          </span>
        );
      })}
    </nav>
  );
}
