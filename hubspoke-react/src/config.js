export const API_BASE = 'http://localhost';
export const API_PATH = '/convert-rank-dev/apis';
export const ACCESS_TOKEN = window.ACCESS_TOKEN || "";

export function safeJsonParse(value) {
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