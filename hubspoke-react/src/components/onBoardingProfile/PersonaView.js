import React from "react";
import { Link, useParams } from "react-router-dom";
import { useState, useMemo } from "react";
import "./PersonaView.css";

export default function PersonaView({
  persona,
  chat = [],
  onEdit,
  onRegenerate,
  onGoKeywords,
  onGoIR,
}) {
  const [showChat, setShowChat] = useState(false);
  const answers = persona?.answers || {};
  const createdAt = persona?.created_at || null;

  const summary = useMemo(() => {
    return [
      { label: "Industry / Service", value: answers.industry || "—" },
      { label: "Primary Goal (3–6 months)", value: answers.primary_goal || "—" },
      {
        label: "Ideal Audience",
        value:
          Array.isArray(answers.ideal_audience) && answers.ideal_audience.length
            ? answers.ideal_audience.join(", ")
            : "—",
      },
    ];
  }, [answers]);

  const sections = [
    {
      title: "Authority Topics",
      items: Array.isArray(answers.authority_topics) ? answers.authority_topics : [],
      emptyText: "No topics added yet.",
    },
    {
      title: "Buyer Language (Real Phrases)",
      items: Array.isArray(answers.buyer_language) ? answers.buyer_language : [],
      emptyText: "No buyer phrases added yet.",
    },
    {
      title: "Seed Keywords",
      items: Array.isArray(answers.seed_keywords) ? answers.seed_keywords : [],
      emptyText: "No seed keywords added yet.",
    },
  ];

  return (
    <div className="persona-wrap">
      {/* Header */}
      <div className="persona-header">
        <div>
          <h1 className="persona-h1">Persona</h1>
          <div className="persona-muted">
            {createdAt ? `Created ${formatDate(createdAt)}` : "Created —"}
          </div>
        </div>

        <div className="persona-header-actions">
          <button className="btn-ghost" onClick={() => setShowChat((s) => !s)}>
            {showChat ? "Hide Chat Transcript" : "View Chat Transcript"}
          </button>
          {onEdit && (
            <button className="btn-ghost" onClick={onEdit}>
              Edit Persona
            </button>
          )}
        </div>
      </div>

      {/* Summary cards */}
      <div className="persona-card-row">
        {summary.map((item, idx) => (
          <div key={idx} className="persona-card">
            <div className="persona-card-label">{item.label}</div>
            <div className="persona-card-value">{item.value}</div>
          </div>
        ))}
      </div>

      {/* Detail sections */}
      {sections.map((sec) => (
        <div key={sec.title} className="persona-section">
          <div className="persona-section-head">
            <h2 className="persona-h2">{sec.title}</h2>
          </div>
          {sec.items.length ? (
            <div className="chips-wrap">
              {sec.items.map((chip, i) => (
                <span key={i} className="chip">
                  {chip}
                </span>
              ))}
            </div>
          ) : (
            <div className="empty">{sec.emptyText}</div>
          )}
        </div>
      ))}

      {/* Chat transcript */}
      {showChat && (
        <div className="persona-section">
          <div className="persona-section-head">
            <h2 className="persona-h2">Onboarding Chat Transcript</h2>
          </div>
          {Array.isArray(chat) && chat.length ? (
            <div className="chat-list">
              {chat.map((step, i) => (
                <div key={i} className="chat-item">
                  <div className="chat-time">{formatDate(step.timestamp)}</div>
                  <div className="chat-q">Q: {step?.question?.text || "—"}</div>
                  <div className="chat-a">A: {renderAnswer(step?.answer)}</div>
                </div>
              ))}
            </div>
          ) : (
            <div className="empty">No transcript available.</div>
          )}
        </div>
      )}

      {/* Footer nav */}
      <div className="persona-footer">
        <div className="footer-hint">
          Next steps: review Keywords, then refine your Information Architecture.
        </div>
        <div>
          {onGoKeywords && (
            <button className="btn-secondary" onClick={onGoKeywords}>
              Go to Keywords →
            </button>
          )}
          {onGoIR && (
            <button className="btn-secondary" onClick={onGoIR}>
              Go to Information Architecture →
            </button>
          )}
        </div>
      </div>
    </div>
  );
}

function renderAnswer(ans) {
  if (!ans) return "—";
  if (ans.text && ans.text.trim()) return ans.text;
  const all = [].concat(ans.selected || []).concat(ans.custom || []);
  return all.length ? all.join(", ") : "—";
}

function formatDate(iso) {
  try {
    const d = new Date(iso);
    if (isNaN(d.getTime())) return "—";
    return d.toLocaleString();
  } catch {
    return "—";
  }
}