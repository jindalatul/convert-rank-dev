<?php
ini_set("display_errors","On");
require_once("main-api.php");
sleep(03);
$text = <<<EOT
[
    {
        "keyword": "accurate bookkeeping services",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 14,
        "keyword_difficulty": 5,
        "search_intent": "navigational"
    },
    {
        "keyword": "monthly bookkeeping services",
        "competition": 0.25,
        "competition_level": "LOW",
        "cpc": 19.29,
        "search_volume": 320,
        "estimated_traffic": 86,
        "keyword_difficulty": 10,
        "search_intent": "navigational"
    },
    {
        "keyword": "affordable bookkeeping services",
        "competition": 0.23,
        "competition_level": "LOW",
        "cpc": 21.99,
        "search_volume": 210,
        "estimated_traffic": 45,
        "keyword_difficulty": 28,
        "search_intent": "commercial"
    },
    {
        "keyword": "best bookkeeping for self-employed",
        "competition": 0.41,
        "competition_level": "MEDIUM",
        "cpc": 12.48,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "digits bookkeeping",
        "competition": 0.62,
        "competition_level": "MEDIUM",
        "cpc": 13.59,
        "search_volume": 50,
        "estimated_traffic": 13,
        "keyword_difficulty": 11,
        "search_intent": "commercial"
    },
    {
        "keyword": "catch up bookkeeping",
        "competition": 0.43,
        "competition_level": "MEDIUM",
        "cpc": 35.58,
        "search_volume": 260,
        "estimated_traffic": 78,
        "keyword_difficulty": 0,
        "search_intent": "not available"
    },
    {
        "keyword": "intuit bookkeeping training",
        "competition": 0.45,
        "competition_level": "MEDIUM",
        "cpc": 6.52,
        "search_volume": 50,
        "estimated_traffic": 12,
        "keyword_difficulty": 20,
        "search_intent": "commercial"
    },
    {
        "keyword": "self-employed bookkeeping",
        "competition": 0.45,
        "competition_level": "MEDIUM",
        "cpc": 30.35,
        "search_volume": 210,
        "estimated_traffic": 56,
        "keyword_difficulty": 11,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting services for individuals",
        "competition": 0.49,
        "competition_level": "MEDIUM",
        "cpc": 10.17,
        "search_volume": 40,
        "estimated_traffic": 10,
        "keyword_difficulty": 16,
        "search_intent": "commercial"
    },
    {
        "keyword": "how to depreciate",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 13,
        "keyword_difficulty": 38,
        "search_intent": "informational"
    },
    {
        "keyword": "trust accounting services",
        "competition": 0.17,
        "competition_level": "LOW",
        "cpc": 2.51,
        "search_volume": 210,
        "estimated_traffic": 63,
        "keyword_difficulty": 0,
        "search_intent": "navigational"
    },
    {
        "keyword": "fund accounting services",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 140,
        "estimated_traffic": 39,
        "keyword_difficulty": 6,
        "search_intent": "navigational"
    },
    {
        "keyword": "best accounting for self-employed",
        "competition": 0.27,
        "competition_level": "LOW",
        "cpc": 18.99,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 50,
        "search_intent": "commercial"
    },
    {
        "keyword": "best accounting for self employed",
        "competition": 0.27,
        "competition_level": "LOW",
        "cpc": 18.99,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 50,
        "search_intent": "commercial"
    },
    {
        "keyword": "profit and loss for self employed",
        "competition": 0.29,
        "competition_level": "LOW",
        "cpc": 5.55,
        "search_volume": 50,
        "estimated_traffic": 12,
        "keyword_difficulty": 21,
        "search_intent": "commercial"
    },
    {
        "keyword": "common business expense categories",
        "competition": 0.47,
        "competition_level": "MEDIUM",
        "cpc": 3.44,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 10,
        "search_intent": "informational"
    },
    {
        "keyword": "disallowed business interest expense carryforward",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "revenue cost and profit",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 4,
        "search_volume": 880,
        "estimated_traffic": 264,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "renda and renda accountants",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 170,
        "estimated_traffic": 51,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "difference between turnover and revenue",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "net operating loss carryback and carryforward",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "depreciation for a tax-paying firm",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 17,
        "search_intent": "informational"
    },
    {
        "keyword": "partnership to s-corp conversion basis",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 3.83,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 12,
        "search_intent": "commercial"
    },
    {
        "keyword": "accurate bookkeeping & tax service",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 110,
        "estimated_traffic": 32,
        "keyword_difficulty": 3,
        "search_intent": "commercial"
    },
    {
        "keyword": "part-time bookkeeping",
        "competition": 0.24,
        "competition_level": "LOW",
        "cpc": 10.26,
        "search_volume": 260,
        "estimated_traffic": 73,
        "keyword_difficulty": 6,
        "search_intent": "commercial"
    },
    {
        "keyword": "xero bookkeeping course",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 7.8,
        "search_volume": 390,
        "estimated_traffic": 117,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "quickbooks vs bookkeeper",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 3.38,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "quickbooks bookkeeping course",
        "competition": 0.58,
        "competition_level": "MEDIUM",
        "cpc": 6.76,
        "search_volume": 1300,
        "estimated_traffic": 355,
        "keyword_difficulty": 9,
        "search_intent": "commercial"
    },
    {
        "keyword": "quickbooks live bookkeeping",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 6.14,
        "search_volume": 1300,
        "estimated_traffic": 328,
        "keyword_difficulty": 16,
        "search_intent": "transactional"
    },
    {
        "keyword": "small business basic bookkeeping",
        "competition": 0.66,
        "competition_level": "MEDIUM",
        "cpc": 35.44,
        "search_volume": 50,
        "estimated_traffic": 14,
        "keyword_difficulty": 10,
        "search_intent": "transactional"
    },
    {
        "keyword": "basic bookkeeping small business",
        "competition": 0.66,
        "competition_level": "MEDIUM",
        "cpc": 35.44,
        "search_volume": 50,
        "estimated_traffic": 12,
        "keyword_difficulty": 22,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping tools",
        "competition": 0.48,
        "competition_level": "MEDIUM",
        "cpc": 48.53,
        "search_volume": 140,
        "estimated_traffic": 29,
        "keyword_difficulty": 32,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping tips",
        "competition": 0.27,
        "competition_level": "LOW",
        "cpc": 9.04,
        "search_volume": 140,
        "estimated_traffic": 40,
        "keyword_difficulty": 4,
        "search_intent": "transactional"
    },
    {
        "keyword": "quickbooks bookkeeping cost",
        "competition": 0.69,
        "competition_level": "HIGH",
        "cpc": 10.96,
        "search_volume": 110,
        "estimated_traffic": 29,
        "keyword_difficulty": 12,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping benefits",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "example of small business bookkeeping",
        "competition": 0.49,
        "competition_level": "MEDIUM",
        "cpc": 13.2,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping guide",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 21.44,
        "search_volume": 30,
        "estimated_traffic": 7,
        "keyword_difficulty": 21,
        "search_intent": "transactional"
    },
    {
        "keyword": "small business accounting tips",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 15.68,
        "search_volume": 390,
        "estimated_traffic": 89,
        "keyword_difficulty": 24,
        "search_intent": "commercial"
    },
    {
        "keyword": "learn bookkeeping with quickbooks",
        "competition": 0.78,
        "competition_level": "HIGH",
        "cpc": 6.83,
        "search_volume": 50,
        "estimated_traffic": 14,
        "keyword_difficulty": 8,
        "search_intent": "transactional"
    },
    {
        "keyword": "best bookkeeping",
        "competition": 0.29,
        "competition_level": "LOW",
        "cpc": 38.84,
        "search_volume": 260,
        "estimated_traffic": 56,
        "keyword_difficulty": 28,
        "search_intent": "commercial"
    },
    {
        "keyword": "personal bookkeeping services",
        "competition": 0.5,
        "competition_level": "MEDIUM",
        "cpc": 19.63,
        "search_volume": 90,
        "estimated_traffic": 22,
        "keyword_difficulty": 19,
        "search_intent": "commercial"
    },
    {
        "keyword": "buy bookkeeping business",
        "competition": 0.7,
        "competition_level": "HIGH",
        "cpc": 2.76,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping services needed",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 9.85,
        "search_volume": 40,
        "estimated_traffic": 9,
        "keyword_difficulty": 25,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping services meaning",
        "competition": 0.04,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "financial services bookkeeping",
        "competition": 0.55,
        "competition_level": "MEDIUM",
        "cpc": 34.58,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping services definition",
        "competition": 0.04,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "financial bookkeeping services",
        "competition": 0.55,
        "competition_level": "MEDIUM",
        "cpc": 34.58,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "navigational"
    },
    {
        "keyword": "bookkeeping business code",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 11,
        "keyword_difficulty": 6,
        "search_intent": "commercial"
    },
    {
        "keyword": "simple business bookkeeping",
        "competition": 0.83,
        "competition_level": "HIGH",
        "cpc": 32.71,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 12,
        "search_intent": "commercial"
    },
    {
        "keyword": "basic business bookkeeping",
        "competition": 0.83,
        "competition_level": "HIGH",
        "cpc": 32.71,
        "search_volume": 20,
        "estimated_traffic": 4,
        "keyword_difficulty": 28,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping service meaning",
        "competition": 0.04,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "accounting for retail business",
        "competition": 0.13,
        "competition_level": "LOW",
        "cpc": 24.28,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping",
        "competition": 0.35,
        "competition_level": "MEDIUM",
        "cpc": 17.49,
        "search_volume": 74000,
        "estimated_traffic": 12210,
        "keyword_difficulty": 45,
        "search_intent": "commercial"
    },
    {
        "keyword": "real-time bookkeeping",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 9.09,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 16,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting and bookkeeping",
        "competition": 0.27,
        "competition_level": "LOW",
        "cpc": 29.38,
        "search_volume": 2900,
        "estimated_traffic": 818,
        "keyword_difficulty": 6,
        "search_intent": "commercial"
    },
    {
        "keyword": "balanced bookkeeping & tax services",
        "competition": 0.07,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "navigational"
    },
    {
        "keyword": "bookkeeping catch-up services",
        "competition": 0.29,
        "competition_level": "LOW",
        "cpc": 19.21,
        "search_volume": 30,
        "estimated_traffic": 7,
        "keyword_difficulty": 26,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting vs bookkeeping services",
        "competition": 0.3,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 5,
        "keyword_difficulty": 42,
        "search_intent": "informational"
    },
    {
        "keyword": "just in time bookkeeping",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping home-based business",
        "competition": 0.42,
        "competition_level": "MEDIUM",
        "cpc": 6.27,
        "search_volume": 90,
        "estimated_traffic": 25,
        "keyword_difficulty": 7,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping and payroll",
        "competition": 0.51,
        "competition_level": "MEDIUM",
        "cpc": 77.26,
        "search_volume": 110,
        "estimated_traffic": 28,
        "keyword_difficulty": 14,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping for cpas",
        "competition": 0.33,
        "competition_level": "LOW",
        "cpc": 25.59,
        "search_volume": 320,
        "estimated_traffic": 63,
        "keyword_difficulty": 34,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting tips for small businesses",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 15.68,
        "search_volume": 390,
        "estimated_traffic": 96,
        "keyword_difficulty": 18,
        "search_intent": "commercial"
    },
    {
        "keyword": "accurate accounting & tax services",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 18.86,
        "search_volume": 110,
        "estimated_traffic": 33,
        "keyword_difficulty": 0,
        "search_intent": "navigational"
    },
    {
        "keyword": "virtual accounting services",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 53.75,
        "search_volume": 210,
        "estimated_traffic": 27,
        "keyword_difficulty": 57,
        "search_intent": "navigational"
    },
    {
        "keyword": "bookkeeping business startup costs",
        "competition": 0.86,
        "competition_level": "HIGH",
        "cpc": 13.57,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping and accounting for dummies",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 3.02,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 14,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping for startup",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 62.38,
        "search_volume": 390,
        "estimated_traffic": 109,
        "keyword_difficulty": 7,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping for creatives",
        "competition": 0.26,
        "competition_level": "LOW",
        "cpc": 10.64,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "profit and loss for service business",
        "competition": 0.7,
        "competition_level": "HIGH",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "full charge bookkeeping meaning",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeper tasks",
        "competition": 0.22,
        "competition_level": "LOW",
        "cpc": 3.14,
        "search_volume": 260,
        "estimated_traffic": 56,
        "keyword_difficulty": 28,
        "search_intent": "commercial"
    },
    {
        "keyword": "fractional bookkeeper",
        "competition": 0.56,
        "competition_level": "MEDIUM",
        "cpc": 35.67,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeper for personal finances",
        "competition": 0.8,
        "competition_level": "HIGH",
        "cpc": 12.73,
        "search_volume": 50,
        "estimated_traffic": 14,
        "keyword_difficulty": 7,
        "search_intent": "commercial"
    },
    {
        "keyword": "xero accounting",
        "competition": 0.74,
        "competition_level": "HIGH",
        "cpc": 14.64,
        "search_volume": 6600,
        "estimated_traffic": 1366,
        "keyword_difficulty": 31,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeper resources",
        "competition": 0.3,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "navigational"
    },
    {
        "keyword": "small business accounting for dummies",
        "competition": 0.58,
        "competition_level": "MEDIUM",
        "cpc": 2.59,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "accounting method for small business",
        "competition": 0.35,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 90,
        "estimated_traffic": 26,
        "keyword_difficulty": 3,
        "search_intent": "transactional"
    },
    {
        "keyword": "business accounting tips",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 50,
        "search_intent": "commercial"
    },
    {
        "keyword": "small business profit and loss statement",
        "competition": 0.37,
        "competition_level": "MEDIUM",
        "cpc": 16.08,
        "search_volume": 880,
        "estimated_traffic": 214,
        "keyword_difficulty": 19,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting needs for small business",
        "competition": 0.43,
        "competition_level": "MEDIUM",
        "cpc": 51.23,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 50,
        "search_intent": "commercial"
    },
    {
        "keyword": "income statement for service business",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 12.48,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeper income",
        "competition": 0.18,
        "competition_level": "LOW",
        "cpc": 9.85,
        "search_volume": 50,
        "estimated_traffic": 12,
        "keyword_difficulty": 21,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeper forum",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 5.95,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 14,
        "search_intent": "navigational"
    },
    {
        "keyword": "bookkeeping and basic accounting",
        "competition": 0.45,
        "competition_level": "MEDIUM",
        "cpc": 6.61,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping meaning",
        "competition": 0.03,
        "competition_level": "LOW",
        "cpc": 5.63,
        "search_volume": 1000,
        "estimated_traffic": 192,
        "keyword_difficulty": 36,
        "search_intent": "informational"
    },
    {
        "keyword": "up to date bookkeeping",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 170,
        "estimated_traffic": 51,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeper forums",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 5.95,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 14,
        "search_intent": "navigational"
    },
    {
        "keyword": "bookkeeper knowledge",
        "competition": 0.29,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 55,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting and bookkeeping books",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 0.87,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping and accounting books",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 0.87,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "intuit bookkeeping",
        "competition": 0.59,
        "competition_level": "MEDIUM",
        "cpc": 8.46,
        "search_volume": 1000,
        "estimated_traffic": 213,
        "keyword_difficulty": 29,
        "search_intent": "commercial"
    },
    {
        "keyword": "learn bookkeeping",
        "competition": 0.73,
        "competition_level": "HIGH",
        "cpc": 11.54,
        "search_volume": 880,
        "estimated_traffic": 235,
        "keyword_difficulty": 11,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping templates",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 12,
        "search_volume": 720,
        "estimated_traffic": 216,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "freelance bookkeeping",
        "competition": 0.41,
        "competition_level": "MEDIUM",
        "cpc": 14.15,
        "search_volume": 1600,
        "estimated_traffic": 480,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "tradition accounting and bookkeeping",
        "competition": 0.03,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping and payroll accounting",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 5.53,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping cost",
        "competition": 0.47,
        "competition_level": "MEDIUM",
        "cpc": 9.68,
        "search_volume": 480,
        "estimated_traffic": 144,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "better bookkeeping",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 3.96,
        "search_volume": 590,
        "estimated_traffic": 161,
        "keyword_difficulty": 9,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping contracts",
        "competition": 0.61,
        "competition_level": "MEDIUM",
        "cpc": 11.9,
        "search_volume": 390,
        "estimated_traffic": 117,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping practice for sale",
        "competition": 0.69,
        "competition_level": "HIGH",
        "cpc": 4.51,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "difference between accounting and bookkeeping",
        "competition": 0.23,
        "competition_level": "LOW",
        "cpc": 2.01,
        "search_volume": 1300,
        "estimated_traffic": 300,
        "keyword_difficulty": 23,
        "search_intent": "informational"
    },
    {
        "keyword": "nonprofit bookkeeping",
        "competition": 0.48,
        "competition_level": "MEDIUM",
        "cpc": 30.58,
        "search_volume": 1000,
        "estimated_traffic": 246,
        "keyword_difficulty": 18,
        "search_intent": "commercial"
    },
    {
        "keyword": "harquin bookkeeping",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 26.71,
        "search_volume": 260,
        "estimated_traffic": 70,
        "keyword_difficulty": 10,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping experience",
        "competition": 0.19,
        "competition_level": "LOW",
        "cpc": 8.23,
        "search_volume": 170,
        "estimated_traffic": 47,
        "keyword_difficulty": 7,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping examples",
        "competition": 0.19,
        "competition_level": "LOW",
        "cpc": 12.21,
        "search_volume": 590,
        "estimated_traffic": 175,
        "keyword_difficulty": 1,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping plus",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 15.85,
        "search_volume": 590,
        "estimated_traffic": 170,
        "keyword_difficulty": 4,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping for sole traders",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping for sole trader",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "buildium bookkeeping",
        "competition": 0.76,
        "competition_level": "HIGH",
        "cpc": 53.2,
        "search_volume": 40,
        "estimated_traffic": 11,
        "keyword_difficulty": 11,
        "search_intent": "commercial"
    },
    {
        "keyword": "appfolio bookkeeping",
        "competition": 0.48,
        "competition_level": "MEDIUM",
        "cpc": 110.52,
        "search_volume": 1300,
        "estimated_traffic": 390,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping skills",
        "competition": 0.24,
        "competition_level": "LOW",
        "cpc": 7.27,
        "search_volume": 390,
        "estimated_traffic": 102,
        "keyword_difficulty": 13,
        "search_intent": "commercial"
    },
    {
        "keyword": "basic bookkeeping",
        "competition": 0.51,
        "competition_level": "MEDIUM",
        "cpc": 11.87,
        "search_volume": 880,
        "estimated_traffic": 240,
        "keyword_difficulty": 9,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping pricing",
        "competition": 0.51,
        "competition_level": "MEDIUM",
        "cpc": 12.97,
        "search_volume": 390,
        "estimated_traffic": 115,
        "keyword_difficulty": 2,
        "search_intent": "commercial"
    },
    {
        "keyword": "free bookkeeping",
        "competition": 0.76,
        "competition_level": "HIGH",
        "cpc": 25.8,
        "search_volume": 320,
        "estimated_traffic": 60,
        "keyword_difficulty": 38,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping for grocery store",
        "competition": 0.15,
        "competition_level": "LOW",
        "cpc": 0.06,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "quicken bookkeeping",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 8.71,
        "search_volume": 260,
        "estimated_traffic": 51,
        "keyword_difficulty": 34,
        "search_intent": "transactional"
    },
    {
        "keyword": "payroll bookkeeping",
        "competition": 0.31,
        "competition_level": "LOW",
        "cpc": 46.16,
        "search_volume": 480,
        "estimated_traffic": 109,
        "keyword_difficulty": 24,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping books",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 2.14,
        "search_volume": 590,
        "estimated_traffic": 177,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "restaurant bookkeeping",
        "competition": 0.45,
        "competition_level": "MEDIUM",
        "cpc": 38.97,
        "search_volume": 720,
        "estimated_traffic": 214,
        "keyword_difficulty": 1,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping icon",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 110,
        "estimated_traffic": 33,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping for private practice",
        "competition": 0.56,
        "competition_level": "MEDIUM",
        "cpc": 33.34,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 8,
        "search_intent": "commercial"
    },
    {
        "keyword": "qbo bookkeeping",
        "competition": 0.76,
        "competition_level": "HIGH",
        "cpc": 18.65,
        "search_volume": 90,
        "estimated_traffic": 16,
        "keyword_difficulty": 40,
        "search_intent": "transactional"
    },
    {
        "keyword": "belay bookkeeping",
        "competition": 0.64,
        "competition_level": "MEDIUM",
        "cpc": 14.32,
        "search_volume": 210,
        "estimated_traffic": 57,
        "keyword_difficulty": 10,
        "search_intent": "commercial"
    },
    {
        "keyword": "ledger bookkeeping",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 0.75,
        "search_volume": 480,
        "estimated_traffic": 131,
        "keyword_difficulty": 9,
        "search_intent": "transactional"
    },
    {
        "keyword": "hire a bookkeeper",
        "competition": 0.44,
        "competition_level": "MEDIUM",
        "cpc": 40.99,
        "search_volume": 1000,
        "estimated_traffic": 255,
        "keyword_difficulty": 15,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping records",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 6.29,
        "search_volume": 90,
        "estimated_traffic": 19,
        "keyword_difficulty": 29,
        "search_intent": "commercial"
    },
    {
        "keyword": "simple bookkeeping",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 20.68,
        "search_volume": 260,
        "estimated_traffic": 66,
        "keyword_difficulty": 16,
        "search_intent": "commercial"
    },
    {
        "keyword": "mclean bookkeeping",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping insurance",
        "competition": 0.35,
        "competition_level": "MEDIUM",
        "cpc": 73.58,
        "search_volume": 720,
        "estimated_traffic": 216,
        "keyword_difficulty": 0,
        "search_intent": "navigational"
    },
    {
        "keyword": "bookkeeping 101",
        "competition": 0.57,
        "competition_level": "MEDIUM",
        "cpc": 7.67,
        "search_volume": 390,
        "estimated_traffic": 108,
        "keyword_difficulty": 8,
        "search_intent": "transactional"
    },
    {
        "keyword": "profit and loss statement for a service business",
        "competition": 0.7,
        "competition_level": "HIGH",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping ads",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 11.51,
        "search_volume": 140,
        "estimated_traffic": 42,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping tutorial",
        "competition": 0.54,
        "competition_level": "MEDIUM",
        "cpc": 11.27,
        "search_volume": 70,
        "estimated_traffic": 16,
        "keyword_difficulty": 24,
        "search_intent": "commercial"
    },
    {
        "keyword": "american bookkeeping",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 3.73,
        "search_volume": 210,
        "estimated_traffic": 63,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping blogs",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 7.67,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "cash balance plans for small business",
        "competition": 0.61,
        "competition_level": "MEDIUM",
        "cpc": 7.56,
        "search_volume": 170,
        "estimated_traffic": 51,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping principles",
        "competition": 0.3,
        "competition_level": "LOW",
        "cpc": 2.36,
        "search_volume": 70,
        "estimated_traffic": 17,
        "keyword_difficulty": 20,
        "search_intent": "commercial"
    },
    {
        "keyword": "affordable bookkeeping",
        "competition": 0.22,
        "competition_level": "LOW",
        "cpc": 68.43,
        "search_volume": 320,
        "estimated_traffic": 90,
        "keyword_difficulty": 6,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping platforms",
        "competition": 0.76,
        "competition_level": "HIGH",
        "cpc": 24.5,
        "search_volume": 50,
        "estimated_traffic": 5,
        "keyword_difficulty": 64,
        "search_intent": "commercial"
    },
    {
        "keyword": "quick bookkeeping",
        "competition": 0.37,
        "competition_level": "MEDIUM",
        "cpc": 17.52,
        "search_volume": 50,
        "estimated_traffic": 11,
        "keyword_difficulty": 28,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping process",
        "competition": 0.19,
        "competition_level": "LOW",
        "cpc": 2.57,
        "search_volume": 50,
        "estimated_traffic": 10,
        "keyword_difficulty": 33,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping format",
        "competition": 0.18,
        "competition_level": "LOW",
        "cpc": 23.72,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "not available"
    },
    {
        "keyword": "bookkeeping functions",
        "competition": 0.2,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 8,
        "search_intent": "informational"
    },
    {
        "keyword": "mobile bookkeeping",
        "competition": 0.5,
        "competition_level": "MEDIUM",
        "cpc": 19.27,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 6,
        "search_intent": "transactional"
    },
    {
        "keyword": "monthly bookkeeping",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 18.01,
        "search_volume": 260,
        "estimated_traffic": 78,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping express",
        "competition": 0.25,
        "competition_level": "LOW",
        "cpc": 4.9,
        "search_volume": 210,
        "estimated_traffic": 58,
        "keyword_difficulty": 8,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping sample",
        "competition": 0.36,
        "competition_level": "MEDIUM",
        "cpc": 3.09,
        "search_volume": 210,
        "estimated_traffic": 57,
        "keyword_difficulty": 9,
        "search_intent": "transactional"
    },
    {
        "keyword": "financial bookkeeping",
        "competition": 0.4,
        "competition_level": "MEDIUM",
        "cpc": 29.33,
        "search_volume": 170,
        "estimated_traffic": 29,
        "keyword_difficulty": 44,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping help",
        "competition": 0.3,
        "competition_level": "LOW",
        "cpc": 37.94,
        "search_volume": 140,
        "estimated_traffic": 31,
        "keyword_difficulty": 27,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting and legal fees small business",
        "competition": 0.71,
        "competition_level": "HIGH",
        "cpc": 11.84,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping uk",
        "competition": 0.19,
        "competition_level": "LOW",
        "cpc": 4.82,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping quotes",
        "competition": 0.18,
        "competition_level": "LOW",
        "cpc": 17.07,
        "search_volume": 140,
        "estimated_traffic": 42,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "general bookkeeping",
        "competition": 0.38,
        "competition_level": "MEDIUM",
        "cpc": 7.13,
        "search_volume": 110,
        "estimated_traffic": 21,
        "keyword_difficulty": 35,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping questions",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 10.07,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "expert bookkeeping",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 7.65,
        "search_volume": 90,
        "estimated_traffic": 23,
        "keyword_difficulty": 16,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping experts",
        "competition": 0.44,
        "competition_level": "MEDIUM",
        "cpc": 29.69,
        "search_volume": 110,
        "estimated_traffic": 15,
        "keyword_difficulty": 56,
        "search_intent": "commercial"
    },
    {
        "keyword": "professional bookkeeping",
        "competition": 0.29,
        "competition_level": "LOW",
        "cpc": 12.21,
        "search_volume": 320,
        "estimated_traffic": 60,
        "keyword_difficulty": 37,
        "search_intent": "transactional"
    },
    {
        "keyword": "reconciled bookkeeping",
        "competition": 0.37,
        "competition_level": "MEDIUM",
        "cpc": 7.8,
        "search_volume": 90,
        "estimated_traffic": 22,
        "keyword_difficulty": 17,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping sheet",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 6.41,
        "search_volume": 90,
        "estimated_traffic": 23,
        "keyword_difficulty": 13,
        "search_intent": "transactional"
    },
    {
        "keyword": "reliable bookkeeping",
        "competition": 0.27,
        "competition_level": "LOW",
        "cpc": 4.52,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "inventory bookkeeping",
        "competition": 0.53,
        "competition_level": "MEDIUM",
        "cpc": 32.23,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "tally bookkeeping",
        "competition": 0.48,
        "competition_level": "MEDIUM",
        "cpc": 33.14,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping workbook",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 0.6,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping usa",
        "competition": 0.18,
        "competition_level": "LOW",
        "cpc": 9.85,
        "search_volume": 40,
        "estimated_traffic": 6,
        "keyword_difficulty": 54,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping simplified",
        "competition": 0.24,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "merchants bookkeeping",
        "competition": 0.05,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "clear bookkeeping",
        "competition": 0.31,
        "competition_level": "LOW",
        "cpc": 21.83,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "property bookkeeping",
        "competition": 0.25,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping errors",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping terms",
        "competition": 0.15,
        "competition_level": "LOW",
        "cpc": 3.69,
        "search_volume": 210,
        "estimated_traffic": 56,
        "keyword_difficulty": 11,
        "search_intent": "informational"
    },
    {
        "keyword": "cash basis accounting for small business",
        "competition": 0.4,
        "competition_level": "MEDIUM",
        "cpc": 30.06,
        "search_volume": 30,
        "estimated_traffic": 5,
        "keyword_difficulty": 42,
        "search_intent": "commercial"
    },
    {
        "keyword": "abc bookkeeping",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 170,
        "estimated_traffic": 51,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping system",
        "competition": 0.6,
        "competition_level": "MEDIUM",
        "cpc": 34.26,
        "search_volume": 170,
        "estimated_traffic": 29,
        "keyword_difficulty": 44,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping unlimited",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 170,
        "estimated_traffic": 51,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping checklist",
        "competition": 0.32,
        "competition_level": "LOW",
        "cpc": 24.33,
        "search_volume": 140,
        "estimated_traffic": 42,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "precision bookkeeping",
        "competition": 0.28,
        "competition_level": "LOW",
        "cpc": 6.1,
        "search_volume": 140,
        "estimated_traffic": 42,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "performance bookkeeping",
        "competition": 0.04,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 140,
        "estimated_traffic": 42,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "basic small business accounting",
        "competition": 0.35,
        "competition_level": "MEDIUM",
        "cpc": 17.89,
        "search_volume": 480,
        "estimated_traffic": 107,
        "keyword_difficulty": 26,
        "search_intent": "commercial"
    },
    {
        "keyword": "balance bookkeeping",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 3.46,
        "search_volume": 110,
        "estimated_traffic": 32,
        "keyword_difficulty": 2,
        "search_intent": "commercial"
    },
    {
        "keyword": "easy small business accounting",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 45.12,
        "search_volume": 880,
        "estimated_traffic": 177,
        "keyword_difficulty": 33,
        "search_intent": "commercial"
    },
    {
        "keyword": "profit first bookkeeper",
        "competition": 0.46,
        "competition_level": "MEDIUM",
        "cpc": 35.2,
        "search_volume": 110,
        "estimated_traffic": 29,
        "keyword_difficulty": 12,
        "search_intent": "commercial"
    },
    {
        "keyword": "startup bookkeeping",
        "competition": 0.6,
        "competition_level": "MEDIUM",
        "cpc": 58.15,
        "search_volume": 140,
        "estimated_traffic": 38,
        "keyword_difficulty": 10,
        "search_intent": "commercial"
    },
    {
        "keyword": "starting bookkeeping",
        "competition": 0.6,
        "competition_level": "MEDIUM",
        "cpc": 58.15,
        "search_volume": 140,
        "estimated_traffic": 37,
        "keyword_difficulty": 12,
        "search_intent": "informational"
    },
    {
        "keyword": "corporation bookkeeping",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 140,
        "estimated_traffic": 42,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "corporate bookkeeping",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 140,
        "estimated_traffic": 35,
        "keyword_difficulty": 17,
        "search_intent": "commercial"
    },
    {
        "keyword": "expenses bookkeeping",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 140,
        "estimated_traffic": 36,
        "keyword_difficulty": 14,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping expenses",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 140,
        "estimated_traffic": 39,
        "keyword_difficulty": 8,
        "search_intent": "commercial"
    },
    {
        "keyword": "start bookkeeping",
        "competition": 0.6,
        "competition_level": "MEDIUM",
        "cpc": 58.15,
        "search_volume": 140,
        "estimated_traffic": 40,
        "keyword_difficulty": 5,
        "search_intent": "commercial"
    },
    {
        "keyword": "expense bookkeeping",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 140,
        "estimated_traffic": 40,
        "keyword_difficulty": 5,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping journal",
        "competition": 0.72,
        "competition_level": "HIGH",
        "cpc": 0.39,
        "search_volume": 90,
        "estimated_traffic": 26,
        "keyword_difficulty": 2,
        "search_intent": "transactional"
    },
    {
        "keyword": "freshbooks bookkeeping",
        "competition": 0.52,
        "competition_level": "MEDIUM",
        "cpc": 24.83,
        "search_volume": 110,
        "estimated_traffic": 29,
        "keyword_difficulty": 11,
        "search_intent": "commercial"
    },
    {
        "keyword": "tidwell bookkeeping",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 110,
        "estimated_traffic": 33,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "modern bookkeeping",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 110,
        "estimated_traffic": 33,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "accountable bookkeeping",
        "competition": 0.18,
        "competition_level": "LOW",
        "cpc": 4.8,
        "search_volume": 110,
        "estimated_traffic": 33,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "accountability bookkeeping",
        "competition": 0.18,
        "competition_level": "LOW",
        "cpc": 4.8,
        "search_volume": 110,
        "estimated_traffic": 33,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "beyond bookkeeping",
        "competition": 0.22,
        "competition_level": "LOW",
        "cpc": 38.8,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "advanced bookkeeping",
        "competition": 0.23,
        "competition_level": "LOW",
        "cpc": 10.01,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping machine",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 4.35,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "full service accounting",
        "competition": 0.28,
        "competition_level": "LOW",
        "cpc": 63.94,
        "search_volume": 110,
        "estimated_traffic": 24,
        "keyword_difficulty": 28,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping gigs",
        "competition": 0.59,
        "competition_level": "MEDIUM",
        "cpc": 2.95,
        "search_volume": 70,
        "estimated_traffic": 19,
        "keyword_difficulty": 10,
        "search_intent": "commercial"
    },
    {
        "keyword": "keystone bookkeeping",
        "competition": 0.04,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "streamline bookkeeping",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "dms bookkeeping",
        "competition": 0.2,
        "competition_level": "LOW",
        "cpc": 6.59,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "diy bookkeeping",
        "competition": 0.25,
        "competition_level": "LOW",
        "cpc": 53.98,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "ontrack bookkeeping",
        "competition": 0.2,
        "competition_level": "LOW",
        "cpc": 27.6,
        "search_volume": 70,
        "estimated_traffic": 20,
        "keyword_difficulty": 4,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping categories",
        "competition": 0.22,
        "competition_level": "LOW",
        "cpc": 4.94,
        "search_volume": 70,
        "estimated_traffic": 18,
        "keyword_difficulty": 14,
        "search_intent": "informational"
    },
    {
        "keyword": "benefits of accounting software",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 16,
        "keyword_difficulty": 22,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping blueprint",
        "competition": 0.3,
        "competition_level": "LOW",
        "cpc": 21.38,
        "search_volume": 50,
        "estimated_traffic": 14,
        "keyword_difficulty": 5,
        "search_intent": "transactional"
    },
    {
        "keyword": "avenue bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "mtm bookkeeping",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping boise",
        "competition": 0.43,
        "competition_level": "MEDIUM",
        "cpc": 30.11,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping raleigh",
        "competition": 0.43,
        "competition_level": "MEDIUM",
        "cpc": 6.32,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "prosperity bookkeeping",
        "competition": 0.35,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping purpose",
        "competition": 0.11,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 16,
        "keyword_difficulty": 24,
        "search_intent": "commercial"
    },
    {
        "keyword": "good bookkeeping",
        "competition": 0.44,
        "competition_level": "MEDIUM",
        "cpc": 7.72,
        "search_volume": 50,
        "estimated_traffic": 13,
        "keyword_difficulty": 14,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping supplies",
        "competition": 0.64,
        "competition_level": "MEDIUM",
        "cpc": 2.1,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping textbook",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 3.28,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping paper",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 2.7,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "icb bookkeeping",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 12,
        "keyword_difficulty": 20,
        "search_intent": "transactional"
    },
    {
        "keyword": "westside bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "a1 bookkeeping",
        "competition": 0.11,
        "competition_level": "LOW",
        "cpc": 11.11,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping reports",
        "competition": 0.19,
        "competition_level": "LOW",
        "cpc": 20.01,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping importance",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 12,
        "keyword_difficulty": 23,
        "search_intent": "commercial"
    },
    {
        "keyword": "a bookkeeping",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 8,
        "keyword_difficulty": 45,
        "search_intent": "commercial"
    },
    {
        "keyword": "wci bookkeeping",
        "competition": 0.07,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping niches",
        "competition": 0.14,
        "competition_level": "LOW",
        "cpc": 1.95,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "reno bookkeeping",
        "competition": 0.57,
        "competition_level": "MEDIUM",
        "cpc": 3.51,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "ross bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "booming bookkeeping reviews",
        "competition": 0.17,
        "competition_level": "LOW",
        "cpc": 37.39,
        "search_volume": 210,
        "estimated_traffic": 63,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "profit and loss statement service business",
        "competition": 0.7,
        "competition_level": "HIGH",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "study bookkeeping",
        "competition": 0.51,
        "competition_level": "MEDIUM",
        "cpc": 8.55,
        "search_volume": 40,
        "estimated_traffic": 10,
        "keyword_difficulty": 20,
        "search_intent": "transactional"
    },
    {
        "keyword": "snelling bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "1099 bookkeeping",
        "competition": 0.63,
        "competition_level": "MEDIUM",
        "cpc": 6.28,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping connection",
        "competition": 0.24,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping bizz",
        "competition": 0,
        "competition_level": "UNKNOWN",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping day",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping income",
        "competition": 0.18,
        "competition_level": "LOW",
        "cpc": 9.85,
        "search_volume": 50,
        "estimated_traffic": 14,
        "keyword_difficulty": 9,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping procedures",
        "competition": 0.31,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 7,
        "keyword_difficulty": 18,
        "search_intent": "commercial"
    },
    {
        "keyword": "az bookkeeping",
        "competition": 0.2,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "income bookkeeping",
        "competition": 0.18,
        "competition_level": "LOW",
        "cpc": 9.85,
        "search_volume": 50,
        "estimated_traffic": 12,
        "keyword_difficulty": 19,
        "search_intent": "informational"
    },
    {
        "keyword": "manual bookkeeping",
        "competition": 0.64,
        "competition_level": "MEDIUM",
        "cpc": 1.37,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "kb bookkeeping",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "smart bookkeeping",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 20.1,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 3,
        "search_intent": "transactional"
    },
    {
        "keyword": "corum bookkeeping",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping methods",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 3.5,
        "search_volume": 30,
        "estimated_traffic": 4,
        "keyword_difficulty": 60,
        "search_intent": "commercial"
    },
    {
        "keyword": "jsh bookkeeping",
        "competition": 0.04,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "barbara's bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "powder bookkeeping",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping posts",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 6.87,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping information",
        "competition": 0.54,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 57,
        "search_intent": "informational"
    },
    {
        "keyword": "s5 bookkeeping",
        "competition": 0.05,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "rei bookkeeping",
        "competition": 0.41,
        "competition_level": "MEDIUM",
        "cpc": 16.04,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping setup",
        "competition": 0.83,
        "competition_level": "HIGH",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 10,
        "keyword_difficulty": 18,
        "search_intent": "transactional"
    },
    {
        "keyword": "canadian bookkeeping",
        "competition": 0.05,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 11,
        "keyword_difficulty": 6,
        "search_intent": "commercial"
    },
    {
        "keyword": "horizon bookkeeping",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 8.43,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping do",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 7,
        "keyword_difficulty": 41,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping credentials",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 11.26,
        "search_volume": 40,
        "estimated_traffic": 7,
        "keyword_difficulty": 38,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping 2",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 9,
        "keyword_difficulty": 21,
        "search_intent": "commercial"
    },
    {
        "keyword": "kcs bookkeeping",
        "competition": 0.15,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping canada",
        "competition": 0.05,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 11,
        "keyword_difficulty": 11,
        "search_intent": "transactional"
    },
    {
        "keyword": "mastering bookkeeping",
        "competition": 0.37,
        "competition_level": "MEDIUM",
        "cpc": 3.81,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 42,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping documents",
        "competition": 0.57,
        "competition_level": "MEDIUM",
        "cpc": 27.08,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 53,
        "search_intent": "commercial"
    },
    {
        "keyword": "quickbooks for accountants 2017",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 15,
        "keyword_difficulty": 28,
        "search_intent": "commercial"
    },
    {
        "keyword": "clearing bookkeeping",
        "competition": 0.31,
        "competition_level": "LOW",
        "cpc": 21.83,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "days bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping diploma",
        "competition": 0.61,
        "competition_level": "MEDIUM",
        "cpc": 15.89,
        "search_volume": 30,
        "estimated_traffic": 6,
        "keyword_difficulty": 32,
        "search_intent": "transactional"
    },
    {
        "keyword": "tabulate bookkeeping",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping naics",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "dorothy's bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping anchorage",
        "competition": 0.46,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "capacity bookkeeping",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "analytical bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "not available"
    },
    {
        "keyword": "bell bookkeeping",
        "competition": 0.07,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "books on bookkeeping and accounting",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 0.87,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "small business expense report",
        "competition": 0.3,
        "competition_level": "LOW",
        "cpc": 32.07,
        "search_volume": 210,
        "estimated_traffic": 48,
        "keyword_difficulty": 24,
        "search_intent": "commercial"
    },
    {
        "keyword": "accurate accounting",
        "competition": 0.06,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 1000,
        "estimated_traffic": 300,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "crisp bookkeeping",
        "competition": 0.19,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 5,
        "search_intent": "transactional"
    },
    {
        "keyword": "more bookkeeping",
        "competition": 0.14,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping india",
        "competition": 0.26,
        "competition_level": "LOW",
        "cpc": 51.2,
        "search_volume": 20,
        "estimated_traffic": 4,
        "keyword_difficulty": 28,
        "search_intent": "transactional"
    },
    {
        "keyword": "lonestar bookkeeping",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping audit",
        "competition": 0.14,
        "competition_level": "LOW",
        "cpc": 12.19,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping is",
        "competition": 0.14,
        "competition_level": "LOW",
        "cpc": 24.77,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 51,
        "search_intent": "informational"
    },
    {
        "keyword": "cashflow bookkeeping",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "bar bookkeeping",
        "competition": 0.27,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "khl bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping glendale",
        "competition": 0.24,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "canada bookkeeping",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 2.9,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 6,
        "search_intent": "commercial"
    },
    {
        "keyword": "glendale bookkeeping",
        "competition": 0.24,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "406 bookkeeping",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "star bookkeeping",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "stash bookkeeping",
        "competition": 0.04,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 8,
        "search_intent": "transactional"
    },
    {
        "keyword": "insight bookkeeping",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "entry bookkeeping",
        "competition": 0.37,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 49,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping forums",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 5.95,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 14,
        "search_intent": "navigational"
    },
    {
        "keyword": "bookkeeping & more",
        "competition": 0.14,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "lucrative bookkeeping",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "jw bookkeeping",
        "competition": 0.04,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "tomberlin bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "tzm bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping forum",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 5.95,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 14,
        "search_intent": "navigational"
    },
    {
        "keyword": "bookkeeping knowledge",
        "competition": 0.29,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 55,
        "search_intent": "commercial"
    },
    {
        "keyword": "xero revenues",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 90,
        "estimated_traffic": 25,
        "keyword_difficulty": 8,
        "search_intent": "informational"
    },
    {
        "keyword": "how bookkeeping differs from accounting",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 10,
        "keyword_difficulty": 15,
        "search_intent": "informational"
    },
    {
        "keyword": "accrual vs cash accounting for small business",
        "competition": 0.24,
        "competition_level": "LOW",
        "cpc": 15.42,
        "search_volume": 260,
        "estimated_traffic": 65,
        "keyword_difficulty": 17,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting bookkeeping courses",
        "competition": 0.66,
        "competition_level": "MEDIUM",
        "cpc": 20.98,
        "search_volume": 390,
        "estimated_traffic": 106,
        "keyword_difficulty": 9,
        "search_intent": "commercial"
    },
    {
        "keyword": "best accounting tools",
        "competition": 0.18,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeper skills required",
        "competition": 0.22,
        "competition_level": "LOW",
        "cpc": 17.56,
        "search_volume": 50,
        "estimated_traffic": 13,
        "keyword_difficulty": 15,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting fees small business",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 31.2,
        "search_volume": 90,
        "estimated_traffic": 26,
        "keyword_difficulty": 4,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting vs bookkeeping",
        "competition": 0.13,
        "competition_level": "LOW",
        "cpc": 4.58,
        "search_volume": 2400,
        "estimated_traffic": 554,
        "keyword_difficulty": 23,
        "search_intent": "informational"
    },
    {
        "keyword": "small business accounting help",
        "competition": 0.29,
        "competition_level": "LOW",
        "cpc": 30.49,
        "search_volume": 90,
        "estimated_traffic": 20,
        "keyword_difficulty": 25,
        "search_intent": "commercial"
    },
    {
        "keyword": "small business accounting methods",
        "competition": 0.35,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 90,
        "estimated_traffic": 23,
        "keyword_difficulty": 16,
        "search_intent": "commercial"
    },
    {
        "keyword": "xero profit and loss statement",
        "competition": 0.54,
        "competition_level": "MEDIUM",
        "cpc": 37.63,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeper skills needed",
        "competition": 0.15,
        "competition_level": "LOW",
        "cpc": 0.12,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 14,
        "search_intent": "commercial"
    },
    {
        "keyword": "solvency now bookkeeping",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 210,
        "estimated_traffic": 57,
        "keyword_difficulty": 10,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping for a sole trader",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "tips for accounting",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 170,
        "estimated_traffic": 44,
        "keyword_difficulty": 13,
        "search_intent": "informational"
    },
    {
        "keyword": "rules for double entry bookkeeping",
        "competition": 0.06,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 11,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping sheet example",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 8.2,
        "search_volume": 70,
        "estimated_traffic": 20,
        "keyword_difficulty": 3,
        "search_intent": "commercial"
    },
    {
        "keyword": "single entry bookkeeping",
        "competition": 0.2,
        "competition_level": "LOW",
        "cpc": 6.48,
        "search_volume": 590,
        "estimated_traffic": 172,
        "keyword_difficulty": 3,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping side hustle",
        "competition": 0.26,
        "competition_level": "LOW",
        "cpc": 3.51,
        "search_volume": 320,
        "estimated_traffic": 78,
        "keyword_difficulty": 19,
        "search_intent": "transactional"
    },
    {
        "keyword": "sole proprietor bookkeeping",
        "competition": 0.43,
        "competition_level": "MEDIUM",
        "cpc": 37.06,
        "search_volume": 110,
        "estimated_traffic": 33,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bottom line bookkeeping",
        "competition": 0.13,
        "competition_level": "LOW",
        "cpc": 8.64,
        "search_volume": 480,
        "estimated_traffic": 144,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "system six bookkeeping",
        "competition": 0.03,
        "competition_level": "LOW",
        "cpc": 4.78,
        "search_volume": 140,
        "estimated_traffic": 42,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "free accounting advice for small business owners",
        "competition": 0.88,
        "competition_level": "HIGH",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 50,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping naics code",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 2.59,
        "search_volume": 320,
        "estimated_traffic": 93,
        "keyword_difficulty": 3,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping launch reviews",
        "competition": 0.38,
        "competition_level": "MEDIUM",
        "cpc": 6.31,
        "search_volume": 210,
        "estimated_traffic": 63,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "accounts payable bookkeeping",
        "competition": 0.33,
        "competition_level": "LOW",
        "cpc": 31.32,
        "search_volume": 50,
        "estimated_traffic": 14,
        "keyword_difficulty": 6,
        "search_intent": "commercial"
    },
    {
        "keyword": "free bookkeeping accounting",
        "competition": 0.67,
        "competition_level": "HIGH",
        "cpc": 13.85,
        "search_volume": 90,
        "estimated_traffic": 19,
        "keyword_difficulty": 29,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping pricing packages",
        "competition": 0.22,
        "competition_level": "LOW",
        "cpc": 6.66,
        "search_volume": 140,
        "estimated_traffic": 42,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "examples of bookkeeping",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 7.28,
        "search_volume": 90,
        "estimated_traffic": 26,
        "keyword_difficulty": 5,
        "search_intent": "informational"
    },
    {
        "keyword": "balance sheet service business",
        "competition": 0.59,
        "competition_level": "MEDIUM",
        "cpc": 3.71,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 16,
        "search_intent": "commercial"
    },
    {
        "keyword": "bench bookkeeping reviews",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 4.8,
        "search_volume": 50,
        "estimated_traffic": 14,
        "keyword_difficulty": 4,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping vs payroll",
        "competition": 0.22,
        "competition_level": "LOW",
        "cpc": 39.14,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping plus tax",
        "competition": 0.05,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "5 minute bookkeeping",
        "competition": 0.31,
        "competition_level": "LOW",
        "cpc": 19.47,
        "search_volume": 260,
        "estimated_traffic": 62,
        "keyword_difficulty": 21,
        "search_intent": "commercial"
    },
    {
        "keyword": "dialed in bookkeeping",
        "competition": 0.13,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping records example",
        "competition": 0.43,
        "competition_level": "MEDIUM",
        "cpc": 1.43,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 45,
        "search_intent": "informational"
    },
    {
        "keyword": "s corp bookkeeping",
        "competition": 0.5,
        "competition_level": "MEDIUM",
        "cpc": 44.16,
        "search_volume": 170,
        "estimated_traffic": 51,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "tools for accountants",
        "competition": 0.22,
        "competition_level": "LOW",
        "cpc": 26.96,
        "search_volume": 40,
        "estimated_traffic": 9,
        "keyword_difficulty": 26,
        "search_intent": "commercial"
    },
    {
        "keyword": "a plus bookkeeping",
        "competition": 0.04,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 170,
        "estimated_traffic": 51,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping record book",
        "competition": 0.92,
        "competition_level": "HIGH",
        "cpc": 1.96,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "low cost bookkeeping",
        "competition": 0.66,
        "competition_level": "MEDIUM",
        "cpc": 40.59,
        "search_volume": 90,
        "estimated_traffic": 16,
        "keyword_difficulty": 42,
        "search_intent": "transactional"
    },
    {
        "keyword": "accounting bookkeeping certificate",
        "competition": 0.76,
        "competition_level": "HIGH",
        "cpc": 21.99,
        "search_volume": 110,
        "estimated_traffic": 25,
        "keyword_difficulty": 24,
        "search_intent": "commercial"
    },
    {
        "keyword": "triple-entry bookkeeping",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 110,
        "estimated_traffic": 33,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "monthly bookkeeping fees",
        "competition": 0.46,
        "competition_level": "MEDIUM",
        "cpc": 7.62,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "monthly bookkeeping checklist",
        "competition": 0.69,
        "competition_level": "HIGH",
        "cpc": 36.97,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "fundamentals of bookkeeping",
        "competition": 0.73,
        "competition_level": "HIGH",
        "cpc": 9.46,
        "search_volume": 70,
        "estimated_traffic": 18,
        "keyword_difficulty": 14,
        "search_intent": "transactional"
    },
    {
        "keyword": "naics code bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 20,
        "keyword_difficulty": 3,
        "search_intent": "commercial"
    },
    {
        "keyword": "xero balance sheet",
        "competition": 0.27,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "on track bookkeeping",
        "competition": 0.2,
        "competition_level": "LOW",
        "cpc": 27.6,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping fort worth",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 45.11,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "owner-operator bookkeeping",
        "competition": 0.38,
        "competition_level": "MEDIUM",
        "cpc": 11.88,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping 10-key",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "purpose of bookkeeping",
        "competition": 0.11,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 17,
        "keyword_difficulty": 18,
        "search_intent": "commercial"
    },
    {
        "keyword": "personal finance bookkeeping",
        "competition": 0.8,
        "competition_level": "HIGH",
        "cpc": 12.73,
        "search_volume": 50,
        "estimated_traffic": 11,
        "keyword_difficulty": 29,
        "search_intent": "transactional"
    },
    {
        "keyword": "importance of bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 13,
        "keyword_difficulty": 15,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping des moines",
        "competition": 0.23,
        "competition_level": "LOW",
        "cpc": 13.25,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "example of small business budget",
        "competition": 0.55,
        "competition_level": "MEDIUM",
        "cpc": 19.57,
        "search_volume": 140,
        "estimated_traffic": 40,
        "keyword_difficulty": 5,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeper vs accounts payable",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "milbrath-sayler bookkeeping",
        "competition": 0.15,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "online accounting bookkeeping",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 3,
        "keyword_difficulty": 63,
        "search_intent": "commercial"
    },
    {
        "keyword": "double s bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "history of bookkeeping",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 7,
        "search_intent": "commercial"
    },
    {
        "keyword": "debit one bookkeeping",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping balance sheet",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 49.12,
        "search_volume": 30,
        "estimated_traffic": 4,
        "keyword_difficulty": 54,
        "search_intent": "transactional"
    },
    {
        "keyword": "general ledger bookkeeping",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 38.45,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 10,
        "search_intent": "transactional"
    },
    {
        "keyword": "basic bookkeeping examples",
        "competition": 0.5,
        "competition_level": "MEDIUM",
        "cpc": 19.5,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 7,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping st louis",
        "competition": 0.61,
        "competition_level": "MEDIUM",
        "cpc": 63.58,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping skills required",
        "competition": 0.22,
        "competition_level": "LOW",
        "cpc": 17.56,
        "search_volume": 50,
        "estimated_traffic": 13,
        "keyword_difficulty": 15,
        "search_intent": "commercial"
    },
    {
        "keyword": "st louis bookkeeping",
        "competition": 0.61,
        "competition_level": "MEDIUM",
        "cpc": 63.58,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "self-employment bookkeeping",
        "competition": 0.82,
        "competition_level": "HIGH",
        "cpc": 21.49,
        "search_volume": 50,
        "estimated_traffic": 14,
        "keyword_difficulty": 7,
        "search_intent": "commercial"
    },
    {
        "keyword": "methods of bookkeeping",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 3.5,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 14,
        "search_intent": "informational"
    },
    {
        "keyword": "booksmarts accounting & bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "daily bookkeeping tasks",
        "competition": 0.17,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 7,
        "keyword_difficulty": 22,
        "search_intent": "transactional"
    },
    {
        "keyword": "sole trader bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "benefits for accountants",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 170,
        "estimated_traffic": 44,
        "keyword_difficulty": 13,
        "search_intent": "informational"
    },
    {
        "keyword": "accounting bookkeeping books",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 0.87,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping practice set",
        "competition": 0.67,
        "competition_level": "HIGH",
        "cpc": 5.65,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 19,
        "search_intent": "transactional"
    },
    {
        "keyword": "setting up bookkeeping",
        "competition": 0.83,
        "competition_level": "HIGH",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 9,
        "keyword_difficulty": 24,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping ledger example",
        "competition": 0.8,
        "competition_level": "HIGH",
        "cpc": 0.18,
        "search_volume": 40,
        "estimated_traffic": 11,
        "keyword_difficulty": 10,
        "search_intent": "commercial"
    },
    {
        "keyword": "quick bookkeeping courses",
        "competition": 0.84,
        "competition_level": "HIGH",
        "cpc": 15.6,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "accounts receivable bookkeeping",
        "competition": 0.6,
        "competition_level": "MEDIUM",
        "cpc": 20.77,
        "search_volume": 40,
        "estimated_traffic": 9,
        "keyword_difficulty": 23,
        "search_intent": "informational"
    },
    {
        "keyword": "accounting bookkeeping book",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 0.87,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "general bookkeeping duties",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 25,
        "search_intent": "informational"
    },
    {
        "keyword": "at home bookkeeping",
        "competition": 0.52,
        "competition_level": "MEDIUM",
        "cpc": 8.86,
        "search_volume": 20,
        "estimated_traffic": 4,
        "keyword_difficulty": 28,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping set up",
        "competition": 0.83,
        "competition_level": "HIGH",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 11,
        "keyword_difficulty": 12,
        "search_intent": "commercial"
    },
    {
        "keyword": "in balance bookkeeping",
        "competition": 0.13,
        "competition_level": "LOW",
        "cpc": 3.6,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "cliff snelling bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping accounts receivable",
        "competition": 0.6,
        "competition_level": "MEDIUM",
        "cpc": 20.77,
        "search_volume": 40,
        "estimated_traffic": 11,
        "keyword_difficulty": 12,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping general ledger",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 38.45,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 1,
        "search_intent": "transactional"
    },
    {
        "keyword": "h&b bookkeeping",
        "competition": 0.05,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping stock images",
        "competition": 0.24,
        "competition_level": "LOW",
        "cpc": 6.19,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "private practice bookkeeping",
        "competition": 0.56,
        "competition_level": "MEDIUM",
        "cpc": 33.34,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "short bookkeeping courses",
        "competition": 0.53,
        "competition_level": "MEDIUM",
        "cpc": 18.36,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 7,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping hobbs nm",
        "competition": 0.18,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "xero financial reporting",
        "competition": 0.49,
        "competition_level": "MEDIUM",
        "cpc": 2.39,
        "search_volume": 110,
        "estimated_traffic": 30,
        "keyword_difficulty": 8,
        "search_intent": "commercial"
    },
    {
        "keyword": "xero financial statements",
        "competition": 0.49,
        "competition_level": "MEDIUM",
        "cpc": 2.39,
        "search_volume": 110,
        "estimated_traffic": 32,
        "keyword_difficulty": 4,
        "search_intent": "informational"
    },
    {
        "keyword": "xero financial report",
        "competition": 0.49,
        "competition_level": "MEDIUM",
        "cpc": 2.39,
        "search_volume": 110,
        "estimated_traffic": 30,
        "keyword_difficulty": 8,
        "search_intent": "navigational"
    },
    {
        "keyword": "bookkeeping expenses categories",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 45,
        "search_intent": "commercial"
    },
    {
        "keyword": "basic bookkeeping system",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 7.04,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "cash flow bookkeeping",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping contract work",
        "competition": 0.64,
        "competition_level": "MEDIUM",
        "cpc": 5.98,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 17,
        "search_intent": "commercial"
    },
    {
        "keyword": "errors in bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "self-taught bookkeeping",
        "competition": 0.75,
        "competition_level": "HIGH",
        "cpc": 10.31,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 47,
        "search_intent": "transactional"
    },
    {
        "keyword": "j s bookkeeping",
        "competition": 0.3,
        "competition_level": "LOW",
        "cpc": 4.68,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "go figured bookkeeping",
        "competition": 0.28,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "simple bookkeeping system",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 7.04,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 47,
        "search_intent": "transactional"
    },
    {
        "keyword": "year end bookkeeping",
        "competition": 0.17,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 4,
        "keyword_difficulty": 26,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping cash flow",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping journal ledger",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 1.66,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "knowledge of bookkeeping",
        "competition": 0.29,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 55,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping expense categories",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 45,
        "search_intent": "commercial"
    },
    {
        "keyword": "basic bookkeeping duties",
        "competition": 0.25,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping with integrity",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "worry free bookkeeping",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 44,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting for a small business step by step",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 7,
        "keyword_difficulty": 23,
        "search_intent": "commercial"
    },
    {
        "keyword": "xero accounting review",
        "competition": 0.58,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 7,
        "keyword_difficulty": 22,
        "search_intent": "transactional"
    },
    {
        "keyword": "tips for accounting students",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting for services",
        "competition": 0.03,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "navigational"
    },
    {
        "keyword": "accrual accounting quickbooks",
        "competition": 0.4,
        "competition_level": "MEDIUM",
        "cpc": 14.78,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "quickbooks accountant copy",
        "competition": 0.09,
        "competition_level": "LOW",
        "cpc": 15.5,
        "search_volume": 260,
        "estimated_traffic": 76,
        "keyword_difficulty": 3,
        "search_intent": "commercial"
    },
    {
        "keyword": "double entry bookkeeping definition",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 480,
        "estimated_traffic": 112,
        "keyword_difficulty": 22,
        "search_intent": "informational"
    },
    {
        "keyword": "single entry bookkeeping example",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 5.3,
        "search_volume": 140,
        "estimated_traffic": 40,
        "keyword_difficulty": 4,
        "search_intent": "commercial"
    },
    {
        "keyword": "the terms accounting and bookkeeping are interchangeable",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "study guide for accounting",
        "competition": 0.75,
        "competition_level": "HIGH",
        "cpc": 4.92,
        "search_volume": 170,
        "estimated_traffic": 47,
        "keyword_difficulty": 8,
        "search_intent": "transactional"
    },
    {
        "keyword": "ellis bottom line bookkeeping",
        "competition": 0.05,
        "competition_level": "LOW",
        "cpc": 7.85,
        "search_volume": 110,
        "estimated_traffic": 33,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "year end bookkeeping checklist",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 110,
        "estimated_traffic": 33,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "double entry bookkeeping principles",
        "competition": 0.03,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 18,
        "keyword_difficulty": 15,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping or book-keeping",
        "competition": 0.06,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 13,
        "keyword_difficulty": 16,
        "search_intent": "commercial"
    },
    {
        "keyword": "s-corp bookkeeping template",
        "competition": 0.82,
        "competition_level": "HIGH",
        "cpc": 20.13,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "balance sheet of service business",
        "competition": 0.59,
        "competition_level": "MEDIUM",
        "cpc": 3.71,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 16,
        "search_intent": "commercial"
    },
    {
        "keyword": "profit and loss detail report quickbooks online",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping definition in accounting",
        "competition": 0.13,
        "competition_level": "LOW",
        "cpc": 0.04,
        "search_volume": 110,
        "estimated_traffic": 21,
        "keyword_difficulty": 35,
        "search_intent": "informational"
    },
    {
        "keyword": "xero fixed asset register",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "xero chart of accounts",
        "competition": 0.11,
        "competition_level": "LOW",
        "cpc": 8.47,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting for petty cash in quickbooks",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "builder's guide to accounting",
        "competition": 1,
        "competition_level": "HIGH",
        "cpc": 3.07,
        "search_volume": 140,
        "estimated_traffic": 42,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "double-entry bookkeeping principles",
        "competition": 0.03,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 18,
        "keyword_difficulty": 15,
        "search_intent": "commercial"
    },
    {
        "keyword": "quickbooks cash account",
        "competition": 0.23,
        "competition_level": "LOW",
        "cpc": 6.91,
        "search_volume": 50,
        "estimated_traffic": 14,
        "keyword_difficulty": 6,
        "search_intent": "commercial"
    },
    {
        "keyword": "quickbooks accountant 2017",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 17,
        "keyword_difficulty": 19,
        "search_intent": "commercial"
    },
    {
        "keyword": "cash flow statement xero",
        "competition": 0.45,
        "competition_level": "MEDIUM",
        "cpc": 309.37,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 55,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping step by step",
        "competition": 0.49,
        "competition_level": "MEDIUM",
        "cpc": 14.53,
        "search_volume": 70,
        "estimated_traffic": 18,
        "keyword_difficulty": 12,
        "search_intent": "commercial"
    },
    {
        "keyword": "book keeping or bookkeeping",
        "competition": 0.06,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 18,
        "keyword_difficulty": 15,
        "search_intent": "transactional"
    },
    {
        "keyword": "book-keeping or bookkeeping",
        "competition": 0.06,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 70,
        "estimated_traffic": 18,
        "keyword_difficulty": 15,
        "search_intent": "commercial"
    },
    {
        "keyword": "monthly bookkeeping record book",
        "competition": 0.49,
        "competition_level": "MEDIUM",
        "cpc": 7.92,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "double entry bookkeeping advantages",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 12,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "quickbooks cash basis",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "reconciliation discrepancies quickbooks",
        "competition": 0.15,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "balanced bookkeeping of nc",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "double entry bookkeeping history",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 10,
        "keyword_difficulty": 19,
        "search_intent": "transactional"
    },
    {
        "keyword": "double-entry bookkeeping history",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 10,
        "keyword_difficulty": 19,
        "search_intent": "commercial"
    },
    {
        "keyword": "accurate financial statements",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "accurate financial information",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "navigational"
    },
    {
        "keyword": "chart of accounts bookkeeping",
        "competition": 0.31,
        "competition_level": "LOW",
        "cpc": 16.45,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 9,
        "search_intent": "commercial"
    },
    {
        "keyword": "why bookkeeping is important",
        "competition": 0.07,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 50,
        "estimated_traffic": 13,
        "keyword_difficulty": 15,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping chart of accounts",
        "competition": 0.31,
        "competition_level": "LOW",
        "cpc": 16.45,
        "search_volume": 30,
        "estimated_traffic": 7,
        "keyword_difficulty": 18,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping vs financial accounting",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping clean up pricing",
        "competition": 0.66,
        "competition_level": "MEDIUM",
        "cpc": 6.21,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "example of bookkeeping ledger",
        "competition": 0.8,
        "competition_level": "HIGH",
        "cpc": 0.18,
        "search_volume": 40,
        "estimated_traffic": 11,
        "keyword_difficulty": 10,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping meaning in accounting",
        "competition": 0.05,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 48,
        "search_intent": "informational"
    },
    {
        "keyword": "quickbooks asset account",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "double entry bookkeeping rules",
        "competition": 0.06,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 15,
        "search_intent": "transactional"
    },
    {
        "keyword": "double entry bookkeeping inventor",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 7,
        "keyword_difficulty": 20,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping in a sentence",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "small business beginner simple balance sheet",
        "competition": 0.99,
        "competition_level": "HIGH",
        "cpc": 0.11,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "fixed asset register xero",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "financial accounting vs bookkeeping",
        "competition": 0.08,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "informational"
    },
    {
        "keyword": "doing your own bookkeeping",
        "competition": 0.65,
        "competition_level": "MEDIUM",
        "cpc": 4.11,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 57,
        "search_intent": "transactional"
    },
    {
        "keyword": "end of year bookkeeping",
        "competition": 0.17,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 4,
        "keyword_difficulty": 26,
        "search_intent": "commercial"
    },
    {
        "keyword": "when performing bookkeeping procedures",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 9,
        "search_intent": "informational"
    },
    {
        "keyword": "sample profit and loss statement for business",
        "competition": 0.48,
        "competition_level": "MEDIUM",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 17,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting tools",
        "competition": 0.37,
        "competition_level": "MEDIUM",
        "cpc": 17.11,
        "search_volume": 720,
        "estimated_traffic": 164,
        "keyword_difficulty": 24,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting for fringe benefits",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 7,
        "keyword_difficulty": 20,
        "search_intent": "informational"
    },
    {
        "keyword": "virtual accountant",
        "competition": 0.33,
        "competition_level": "LOW",
        "cpc": 30.55,
        "search_volume": 390,
        "estimated_traffic": 95,
        "keyword_difficulty": 19,
        "search_intent": "navigational"
    },
    {
        "keyword": "business profit and loss statement",
        "competition": 0.42,
        "competition_level": "MEDIUM",
        "cpc": 11.2,
        "search_volume": 720,
        "estimated_traffic": 138,
        "keyword_difficulty": 36,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting for services rendered",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "solvency now bookkeeping mission statement",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "double entry accounting quickbooks",
        "competition": 0.26,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 4,
        "search_intent": "transactional"
    },
    {
        "keyword": "chart of accounts for law firm quickbooks",
        "competition": 0.55,
        "competition_level": "MEDIUM",
        "cpc": 22.29,
        "search_volume": 20,
        "estimated_traffic": 5,
        "keyword_difficulty": 13,
        "search_intent": "commercial"
    },
    {
        "keyword": "business assets and liabilities",
        "competition": 0.14,
        "competition_level": "LOW",
        "cpc": 26.21,
        "search_volume": 20,
        "estimated_traffic": 2,
        "keyword_difficulty": 62,
        "search_intent": "commercial"
    },
    {
        "keyword": "business income and expense worksheet",
        "competition": 0.9,
        "competition_level": "HIGH",
        "cpc": 8.6,
        "search_volume": 260,
        "estimated_traffic": 78,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "single vs double entry bookkeeping",
        "competition": 0.01,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 140,
        "estimated_traffic": 42,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "accounting for service contracts",
        "competition": 0.03,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "business accounting for dummies",
        "competition": 0.94,
        "competition_level": "HIGH",
        "cpc": 1.87,
        "search_volume": 50,
        "estimated_traffic": 15,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "quickbooks year-end closing",
        "competition": 0.03,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 90,
        "estimated_traffic": 26,
        "keyword_difficulty": 3,
        "search_intent": "commercial"
    },
    {
        "keyword": "closing entries in quickbooks",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 3.66,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "informational"
    },
    {
        "keyword": "history of double entry bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 40,
        "estimated_traffic": 10,
        "keyword_difficulty": 13,
        "search_intent": "transactional"
    },
    {
        "keyword": "luca pacioli double entry bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 7,
        "keyword_difficulty": 18,
        "search_intent": "transactional"
    },
    {
        "keyword": "luca pacioli double-entry bookkeeping",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 12,
        "search_intent": "transactional"
    },
    {
        "keyword": "rules of double entry bookkeeping",
        "competition": 0.06,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 8,
        "keyword_difficulty": 11,
        "search_intent": "transactional"
    },
    {
        "keyword": "accounting for home business",
        "competition": 0.49,
        "competition_level": "MEDIUM",
        "cpc": 2.15,
        "search_volume": 20,
        "estimated_traffic": 2,
        "keyword_difficulty": 68,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting for photography business",
        "competition": 0.02,
        "competition_level": "LOW",
        "cpc": 11.15,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "cash receipts journal quickbooks",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "transactional"
    },
    {
        "keyword": "double entry bookkeeping practice questions",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "the double entry bookkeeping system",
        "competition": 0.12,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "transactional"
    },
    {
        "keyword": "cash accounting for small businesses",
        "competition": 0.4,
        "competition_level": "MEDIUM",
        "cpc": 30.06,
        "search_volume": 30,
        "estimated_traffic": 4,
        "keyword_difficulty": 53,
        "search_intent": "commercial"
    },
    {
        "keyword": "retail balance sheet",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": 8,
        "search_intent": "transactional"
    },
    {
        "keyword": "not for profit accounting guide",
        "competition": 0.52,
        "competition_level": "MEDIUM",
        "cpc": 20.35,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "retail accounting basics",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 3,
        "keyword_difficulty": 45,
        "search_intent": "transactional"
    },
    {
        "keyword": "bookkeeping services for small business",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 47.82,
        "search_volume": 2400,
        "estimated_traffic": 324,
        "keyword_difficulty": 55,
        "search_intent": "commercial"
    },
    {
        "keyword": "online bookkeeping services for small business",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 54.03,
        "search_volume": 260,
        "estimated_traffic": 34,
        "keyword_difficulty": 56,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping and accounting services for small business",
        "competition": 0.2,
        "competition_level": "LOW",
        "cpc": 19.49,
        "search_volume": 170,
        "estimated_traffic": 23,
        "keyword_difficulty": 55,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping services for small business near me",
        "competition": 0.5,
        "competition_level": "MEDIUM",
        "cpc": 26.68,
        "search_volume": 90,
        "estimated_traffic": 24,
        "keyword_difficulty": 11,
        "search_intent": "commercial"
    },
    {
        "keyword": "best bookkeeping services for small business",
        "competition": 0.27,
        "competition_level": "LOW",
        "cpc": 56.44,
        "search_volume": 90,
        "estimated_traffic": 12,
        "keyword_difficulty": 55,
        "search_intent": "commercial"
    },
    {
        "keyword": "cost of bookkeeping services for small business",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 12.4,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping services near me for small business",
        "competition": 0.78,
        "competition_level": "HIGH",
        "cpc": 31.94,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping services for small business cost",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 12.4,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "average cost of bookkeeping services for small business",
        "competition": 0.7,
        "competition_level": "HIGH",
        "cpc": 12.88,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping and payroll services for small business",
        "competition": 0.04,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 20,
        "estimated_traffic": 6,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping services for small business",
        "competition": 0.1,
        "competition_level": "LOW",
        "cpc": 47.82,
        "search_volume": 2400,
        "estimated_traffic": 324,
        "keyword_difficulty": 55,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting services for small business",
        "competition": 0.21,
        "competition_level": "LOW",
        "cpc": 44.32,
        "search_volume": 2900,
        "estimated_traffic": 766,
        "keyword_difficulty": 12,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting services for small business cost",
        "competition": 0.16,
        "competition_level": "LOW",
        "cpc": 7.56,
        "search_volume": 30,
        "estimated_traffic": 9,
        "keyword_difficulty": 1,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting services for small business in dubai",
        "competition": 0,
        "competition_level": "LOW",
        "cpc": 0,
        "search_volume": 10,
        "estimated_traffic": 3,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting services for small business near me",
        "competition": 0.31,
        "competition_level": "LOW",
        "cpc": 34.44,
        "search_volume": 390,
        "estimated_traffic": 117,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting services for small business singapore",
        "competition": 0,
        "competition_level": "UNKNOWN",
        "cpc": 0,
        "search_volume": 10,
        "estimated_traffic": 3,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting services for small business south africa",
        "competition": 0,
        "competition_level": "UNKNOWN",
        "cpc": 0,
        "search_volume": 10,
        "estimated_traffic": 3,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "accounting services for small business uk",
        "competition": 0,
        "competition_level": "UNKNOWN",
        "cpc": 0,
        "search_volume": 10,
        "estimated_traffic": 3,
        "keyword_difficulty": "UNKNOWN",
        "search_intent": "commercial"
    },
    {
        "keyword": "best bookkeeping services for small business",
        "competition": 0.27,
        "competition_level": "LOW",
        "cpc": 56.44,
        "search_volume": 90,
        "estimated_traffic": 12,
        "keyword_difficulty": 55,
        "search_intent": "commercial"
    },
    {
        "keyword": "best online bookkeeping services",
        "competition": 0.2,
        "competition_level": "LOW",
        "cpc": 31.71,
        "search_volume": 210,
        "estimated_traffic": 28,
        "keyword_difficulty": 56,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping services examples",
        "competition": 0.62,
        "competition_level": "MEDIUM",
        "cpc": 10.09,
        "search_volume": 40,
        "estimated_traffic": 11,
        "keyword_difficulty": 8,
        "search_intent": "informational"
    },
    {
        "keyword": "bookkeeping services for small business cost",
        "competition": 0.34,
        "competition_level": "MEDIUM",
        "cpc": 12.4,
        "search_volume": 70,
        "estimated_traffic": 21,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping services for small business near me",
        "competition": 0.5,
        "competition_level": "MEDIUM",
        "cpc": 26.68,
        "search_volume": 90,
        "estimated_traffic": 24,
        "keyword_difficulty": 11,
        "search_intent": "commercial"
    },
    {
        "keyword": "bookkeeping services for small business philippines",
        "competition": 0,
        "competition_level": "UNKNOWN",
        "cpc": 0,
        "search_volume": 10,
        "estimated_traffic": 2,
        "keyword_difficulty": 42,
        "search_intent": "commercial"
    },
    {
        "keyword": "monthly bookkeeping services",
        "competition": 0.25,
        "competition_level": "LOW",
        "cpc": 19.29,
        "search_volume": 320,
        "estimated_traffic": 86,
        "keyword_difficulty": 10,
        "search_intent": "navigational"
    },
    {
        "keyword": "online bookkeeping services for small business",
        "competition": 0.39,
        "competition_level": "MEDIUM",
        "cpc": 54.03,
        "search_volume": 260,
        "estimated_traffic": 34,
        "keyword_difficulty": 56,
        "search_intent": "commercial"
    },
    {
        "keyword": "quickbooks bookkeeping services",
        "competition": 0.28,
        "competition_level": "LOW",
        "cpc": 38.75,
        "search_volume": 720,
        "estimated_traffic": 171,
        "keyword_difficulty": 21,
        "search_intent": "commercial"
    },
    {
        "keyword": "virtual bookkeeping services pricing",
        "competition": 0.75,
        "competition_level": "HIGH",
        "cpc": 15.55,
        "search_volume": 90,
        "estimated_traffic": 27,
        "keyword_difficulty": 0,
        "search_intent": "commercial"
    }
]
EOT;
sendResponseJSON($text);die();
?>