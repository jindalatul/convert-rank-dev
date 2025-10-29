import React, { useState, useEffect } from "react";
import { useParams } from 'react-router-dom';

import LoadingSpinner  from "./common/loadingSpinner.js";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

import KeywordsFilterTable from "./keywordsTable/KeywordsTable.js";

import { API_PATH, ACCESS_TOKEN } from "../config.js";

function safeJsonParse(value) {
  if (typeof value === "string") {
    try {
      return JSON.parse(value);
    } catch (e) {
      console.error("Invalid JSON string:", e);
      return [];
    }
  }
  return value; // already object or array
}

export default function DashboardPage()
{
    // const { projectId } = useParams(); // <- when ready. For now hardcode:
    const projectId = 23;
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [keywordsData, setKeywordsData] = useState(null);
    //console.log(projectId);


  useEffect(() => {
    async function fetchData() {
      try {
        const res = await fetch(`${API_PATH}/keywords/get-keywords-v2-mock.php`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${ACCESS_TOKEN}`,
          },
          body: JSON.stringify({ projectId }), // ← include body if your API expects it
        });

        if (!res.ok) throw new Error(`HTTP ${res.status}`);

             const raw = await res.json(); // PHP may wrap JSON in quotes

      // 👇 handle stringified JSON response
        const data = safeJsonParse(raw);
        const kwArray = Array.isArray(data) ? data : data.keywords || [];

        setKeywordsData(kwArray);
        // toast.success("Keywords loaded successfully");
      } catch (e) {
        console.error("Fetch keywords failed:", e);
        setError(e.message);
        // toast.error("Failed to load keywords");
      } finally {
        setLoading(false);
      }
    }

    fetchData();
  }, [projectId]);

  // Log only when state actually changes
  useEffect(() => {
    console.log("keywordsData (state) changed:", keywordsData);
  }, [keywordsData]);

    if (error) return <div style={{ color: "red" }}>Error: {error}</div>;

    if (loading) {
        return <LoadingSpinner message="Building Hub Spokes"/>;
    }
    //{/* <KeywordsFilterTable  keywords={keywordsData} /> */}
    return (
        <>
            <ToastContainer position="top-right" autoClose={2000} />
            <div className="min-h-screen bg-gray-50 p-6">
                <KeywordsFilterTable keywords={keywordsData} />
            </div>
        </>
    );

}