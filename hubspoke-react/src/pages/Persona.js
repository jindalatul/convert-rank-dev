import React, { useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";
import PersonaView from "../components/onBoardingProfile/PersonaView";
import Breadcrumbs from "../components/common/Breadcrumbs";
import LoadingSpinner from "../components/common/loadingSpinner";
import { API_PATH, ACCESS_TOKEN, safeJsonParse } from "../config";

const PERSONA_URL = `${API_PATH}/get-persona.php`;

export default function PersonaPage() {
  const { projectId } = useParams();
  const [onboardingProfile, setOnBoardingProfile] = useState(null);
  const [loading, setLoading] = useState(true);
  const [loadingText, setLoadingText] = useState("Loading Persona");
  const [error, setError] = useState(null);

  useEffect(() => {
    async function fetchData() {

      setLoadingText("Fetching Onboarding Prolfe");

      try {
        const res = await fetch(PERSONA_URL, {
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
        setOnBoardingProfile(data);
        // toast.success("Keywords loaded successfully");
      } catch (e) {
        console.error("Fetch Onboarding Profile failed:", e);
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
      console.log("onboardingProfile (state) changed:", onboardingProfile);
    }, [onboardingProfile]);
  

    if (error) return <div style={{ color: "red" }}>Error: {error}</div>;

    if (loading) {
        return <LoadingSpinner message={loadingText} />;
    }
  return (
    <>
    <Breadcrumbs />
    <PersonaView
      persona={onboardingProfile.persona}
      chat={onboardingProfile.chat}
      onEdit={() => alert("Edit Persona")}
      onRegenerate={() => alert("Regenerate Keywords / IR")}
      onGoKeywords={() => alert("Go to Keywords")}
      onGoIR={() => alert("Go to IR")}
    />
    </>
  );
}
