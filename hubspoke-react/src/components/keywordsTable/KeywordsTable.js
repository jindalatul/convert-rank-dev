import React, { useEffect, useMemo, useState } from "react";
import "./keywords-table.css";

export default function KeywordsFilterTable({ keywords = [], pageSize = 60 }) {
  const [page, setPage] = useState(1);
  const [colWidths, setColWidths] = useState({ keyword: 250 });
  const [sortBy, setSortBy] = useState("search_volume");
  const [sortDir, setSortDir] = useState("desc");
  const [query, setQuery] = useState("");

  const columnWidths = {
        keyword: "280px",
        competition: "60px",
        competition_level: "80px",
        cpc: "70px",
        search_volume: "80px",
        estimated_traffic: "90px",
        keyword_difficulty: "60px",
        search_intent: "120px",
};

  // Parse JSON if needed
  const rows = useMemo(() => {
    if (typeof keywords === "string") {
      try {
        const parsed = JSON.parse(keywords);
        return Array.isArray(parsed) ? parsed : [];
      } catch {
        return [];
      }
    }
    return Array.isArray(keywords) ? keywords : [];
  }, [keywords]);

  // Filter
  const filtered = useMemo(() => {
    const q = query.trim().toLowerCase();
    if (!q) return rows;
    return rows.filter((r) => String(r.keyword || "").toLowerCase().includes(q));
  }, [rows, query]);

  // Sort
  const sorted = useMemo(() => {
    const data = [...filtered];
    const numericCols = new Set([
      "competition",
      "cpc",
      "search_volume",
      "estimated_traffic",
      "keyword_difficulty",
    ]);
    data.sort((a, b) => {
      const va = a?.[sortBy];
      const vb = b?.[sortBy];
      if (numericCols.has(sortBy)) {
        const na = parseFloat(va) || 0;
        const nb = parseFloat(vb) || 0;
        return sortDir === "asc" ? na - nb : nb - na;
      } else {
        const sa = String(va ?? "").toLowerCase();
        const sb = String(vb ?? "").toLowerCase();
        return sortDir === "asc" ? sa.localeCompare(sb) : sb.localeCompare(sa);
      }
    });
    return data;
  }, [filtered, sortBy, sortDir]);

  // Pagination
  const totalPages = Math.max(1, Math.ceil(sorted.length / pageSize));
  const pageSafe = Math.min(Math.max(page, 1), totalPages);
  const start = (pageSafe - 1) * pageSize;
  const visible = sorted.slice(start, start + pageSize);

  // Reset page when inputs change
  useEffect(() => {
    setPage(1);
  }, [keywords, pageSize, sortBy, sortDir, query]);

  // ✅ compute metrics once, before rendering (hooks stay in same order)
  const metricsAll = useMemo(() => computeMetrics(rows), [rows]);
  const metricsFiltered = useMemo(() => computeMetrics(filtered), [filtered]);

  // ⚠️ REMOVE any duplicate metricsAll / metricsFiltered further below
  // (They were originally right before your return — delete those old lines)

  const onHeaderClick = (col) => {
    if (sortBy === col) {
      setSortDir((d) => (d === "asc" ? "desc" : "asc"));
    } else {
      setSortBy(col);
      setSortDir("desc");
    }
  };

const startResize = (e, key) => {
  e.stopPropagation(); // prevent triggering sort
  const startX = e.clientX;
  const startWidth = colWidths[key] || 250;

  const onMove = (ev) => {
    const delta = ev.clientX - startX;
    setColWidths((prev) => ({
      ...prev,
      [key]: Math.max(100, startWidth + delta),
    }));
  };

  const onUp = () => {
    document.removeEventListener("mousemove", onMove);
    document.removeEventListener("mouseup", onUp);
  };

  document.addEventListener("mousemove", onMove);
  document.addEventListener("mouseup", onUp);
};

  const headCell = (key, label) => {
    const isActive = sortBy === key;
    const arrow = isActive ? (sortDir === "asc" ? "▲" : "▼") : "⇅";
    return (
      <th style={{
        width: key === "keyword"
            ? `${colWidths.keyword}px` // ✅ resizable for the first column
            : columnWidths[key] || "auto", // ✅ fixed width for all others
        }}
        key={key}
        className={`kw-th ${isActive ? "kw-sort-active" : ""}`}
        onClick={() => onHeaderClick(key)}
        title={`Sort by ${label}`}
      >
        <span className="kw-th__label">{label}</span>
        <span className="kw-th__arrow">{arrow}</span>
          {key === "keyword" && (
                <div className="resize-handle" onMouseDown={(e) => startResize(e, key)}></div>
          )}
      </th>
    );
  };

  return (
    <div className="kw-container">
        {rows.length === 0 ? (
      <p className="kw-empty">No keywords to show.</p>
    ) : (
      <>
        <div className="kw-summary">
        <div className="kw-card">
          <div className="kw-card-title">Total Search Volume</div>
          <div className="kw-card-value">{formatInt(metricsAll.totalSV)}</div>
          <div className="kw-card-sub">
            {query ? `Filtered: ${formatInt(metricsFiltered.totalSV)}` : "All keywords"}
          </div>
        </div>

        <div className="kw-card">
          <div className="kw-card-title">Total Traffic</div>
          <div className="kw-card-value">{formatInt(metricsAll.totalTraffic)}</div>
          <div className="kw-card-sub">
            {query ? `Filtered: ${formatInt(metricsFiltered.totalTraffic)}` : "All keywords"}
          </div>
        </div>

        <div className="kw-card">
          <div className="kw-card-title">Low + Medium Competition</div>
          <div className="kw-card-value">{formatInt(metricsAll.lowMedCount)}</div>
          <div className="kw-card-sub">
            {query ? `Filtered: ${formatInt(metricsFiltered.lowMedCount)}` : "All keywords"}
          </div>
        </div>

        <div className="kw-card">
          <div className="kw-card-title">Intent Breakdown</div>
          <div className="kw-card-intents">
            <span>C: {formatInt(metricsAll.intent.commercial)}</span>
            <span>I: {formatInt(metricsAll.intent.informational)}</span>
            <span>T: {formatInt(metricsAll.intent.transactional)}</span>
            <span>N: {formatInt(metricsAll.intent.navigational)}</span>
          </div>
          {query && (
            <div className="kw-card-intents kw-card-sub">
              <span>C: {formatInt(metricsFiltered.intent.commercial)}</span>
              <span>I: {formatInt(metricsFiltered.intent.informational)}</span>
              <span>T: {formatInt(metricsFiltered.intent.transactional)}</span>
              <span>N: {formatInt(metricsFiltered.intent.navigational)}</span>
            </div>
          )}
        </div>
      </div>

      {/* Top toolbar */}
      <div className="kw-toolbar">
        <div className="kw-search-wrap">
          <input
            className="kw-search"
            type="text"
            placeholder="Search keyword…"
            value={query}
            onChange={(e) => setQuery(e.target.value)}
          />
          {query && (
            <button className="kw-clear" onClick={() => setQuery("")}>
              ×
            </button>
          )}
        </div>

        <div className="kw-pager-top">
          <button onClick={() => setPage(1)} disabled={pageSafe === 1}>⏮</button>
          <button onClick={() => setPage((p) => Math.max(1, p - 1))} disabled={pageSafe === 1}>◀</button>
          <span className="kw-page-info">Page {pageSafe} of {totalPages}</span>
          <button onClick={() => setPage((p) => Math.min(totalPages, p + 1))} disabled={pageSafe === totalPages}>▶</button>
          <button onClick={() => setPage(totalPages)} disabled={pageSafe === totalPages}>⏭</button>
        </div>
      </div>

      {/* Table */}
      <table className="kw-table">
        <thead className="kw-thead">
          <tr>
            {headCell("keyword", "Keyword")}
            {headCell("competition", "Competition")}
            {headCell("competition_level", "Level")}
            {headCell("cpc", "CPC")}
            {headCell("search_volume", "Search Volume")}
            {headCell("estimated_traffic", "Traffic")}
            {headCell("keyword_difficulty", "Difficulty")}
            {headCell("search_intent", "Intent")}
          </tr>
        </thead>
        <tbody className="kw-tbody">
          {visible.map((k, i) => (
            <tr key={start + i}>
              <td><Highlight text={k.keyword} query={query} /></td>
              <td>{k.competition}</td>
              <td>{k.competition_level}</td>
              <td>{k.cpc}</td>
              <td>{k.search_volume}</td>
              <td>{k.estimated_traffic}</td>
              <td>{k.keyword_difficulty}</td>
              <td>{k.search_intent}</td>
            </tr>
          ))}
        </tbody>
      </table>
      </>
    )}
    </div>
  );
}

// === helpers ===
function computeMetrics(list) {
  // You can change "low/medium" rule here:
  // Currently uses competition_level LOW or MEDIUM (case-insensitive)
  const isLowMed = (lvl) => {
    const L = String(lvl || "").toUpperCase();
    return L === "LOW" || L === "MEDIUM";
  };

  let totalSV = 0;
  let totalTraffic = 0;
  let lowMedCount = 0;

  const intent = {
    commercial: 0,
    informational: 0,
    transactional: 0,
    navigational: 0,
  };

  for (const k of list) {
    const sv = Number(k?.search_volume) || 0;
    const tr = Number(k?.estimated_traffic) || 0;
    totalSV += sv;
    totalTraffic += tr;

    if (isLowMed(k?.competition_level)) lowMedCount += 1;

    const i = String(k?.search_intent || "").toLowerCase();
    if (i === "commercial") intent.commercial += 1;
    else if (i === "informational") intent.informational += 1;
    else if (i === "transactional") intent.transactional += 1;
    else if (i === "navigational") intent.navigational += 1;
  }

  return { totalSV, totalTraffic, lowMedCount, intent };
}

function formatInt(n) {
  return Number(n || 0).toLocaleString();
}

function Highlight({ text, query }) {
  const t = String(text || "");
  const q = String(query || "").trim().toLowerCase();
  if (!q) return t;
  const idx = t.toLowerCase().indexOf(q);
  if (idx === -1) return t;
  const before = t.slice(0, idx);
  const match = t.slice(idx, idx + q.length);
  const after = t.slice(idx + q.length);
  return (
    <span>
      {before}
      <mark className="kw-mark">{match}</mark>
      {after}
    </span>
  );
}
