// src/pages/Keywords.js
import React, {useState, useEffect} from "react";
import { Link, useParams } from "react-router-dom";
import Breadcrumbs from "../components/common/Breadcrumbs";
import LoadingSpinner from "../components/common/loadingSpinner.js";
import KeywordsFilterTable from "../components/keywordsTable/KeywordsTable.js";

import { API_PATH, ACCESS_TOKEN, safeJsonParse } from "../config.js";

export default function Keywords() {

      const { projectId } = useParams(); // <- when ready. For now hardcode:
      const [loading, setLoading] = useState(true);
  
      const [stage, setStage] = useState("keywords");
      const [loadingText, setLoadingText] = useState("Analyzing your business profile...");
  
      const [error, setError] = useState(null);
      const [keywordsData, setKeywordsData] = useState(null);
  
  useEffect(() => {
    async function fetchData() {

      setLoadingText("Finding relevant keywords for your audience...");

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

        setLoadingText("Grouping keywords into topic clusters...");

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
        return <LoadingSpinner message={loadingText} />;
    }
    
    return (
        <>
            {/*<ToastContainer position="top-right" autoClose={2000} /> */}
            <Breadcrumbs />
            <KeywordsFilterTable keywords={keywordsData} />
            
        </>
    );

}