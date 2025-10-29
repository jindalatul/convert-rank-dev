import React from "react";

export default function LoadingSpinner({message}) {
  return (
    <div
      style={{
        display: "flex",
        flexDirection: "column",
        alignItems: "center",
        justifyContent: "center",
        height: "100vh", // full screen
      }}
    >
      {/* Spinner */}
      <div
        style={{
          border: "8px solid #f3f3f3",
          borderTop: "8px solid #3498db",
          borderRadius: "50%",
          width: "60px",
          height: "60px",
          animation: "spin 1s linear infinite",
        }}
      />
      {/* Text under spinner */}
      <p style={{ marginTop: "20px", fontSize: "14px", fontWeight: "300" }}>
        {message}
      </p>

      {/* Inline keyframes */}
      <style>
        {`
          @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
          }
        `}
      </style>
    </div>
  );
}