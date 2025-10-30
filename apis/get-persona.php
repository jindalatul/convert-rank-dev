<?php
sleep(2);
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$persona = [
    "raw" => [
        "industry" => [
            "display_value" => "I am personal injury lawyer"
        ],
        "primary_goal" => [
            "display_value" => "rank top 3 for local searches"
        ],
        "ideal_audience" => [
            "display_value" => "Personal injury cases"
        ],
        "authority_topics" => [
            "display_value" => "personal injury claims, medical malpractice"
        ],
        "buyer_language" => [
            "display_value" => "Personal injury lawyer in san francisco"
        ],
        "seed_keywords" => [
            "display_value" => "personal injury lawyers in san francisco"
        ]
    ],
    "answers" => [
        "industry" => "I am personal injury lawyer",
        "primary_goal" => "rank top 3 for local searches",
        "ideal_audience" => ["Personal injury cases"],
        "authority_topics" => ["personal injury claims", "medical malpractice"],
        "buyer_language" => ["Personal injury lawyer in san francisco"],
        "seed_keywords" => ["personal injury lawyers in san francisco"]
    ],
    "created_at" => "2025-10-29T21:05:29+00:00"
];

$chat = [
    [
        "step" => 0,
        "question" => [
            "key" => "industry",
            "text" => "Which industry do you mainly serve or what service do you offer?"
        ],
        "answer" => [
            "text" => "I am personal injury lawyer",
            "selected" => [],
            "custom" => []
        ],
        "timestamp" => "2025-10-29T21:03:39+00:00"
    ],
    [
        "step" => 1,
        "question" => [
            "key" => "ideal_audience",
            "text" => "Who do you most want to serve right now?"
        ],
        "answer" => [
            "text" => "",
            "selected" => [],
            "custom" => ["Personal injury cases"]
        ],
        "timestamp" => "2025-10-29T21:03:52+00:00"
    ],
    [
        "step" => 2,
        "question" => [
            "key" => "primary_goal",
            "text" => "What is your main goal for the next 3–6 months?"
        ],
        "answer" => [
            "text" => "rank top 3 for local searches",
            "selected" => [],
            "custom" => []
        ],
        "timestamp" => "2025-10-29T21:04:01+00:00"
    ]
];

$response = [
    "ok" => true,
    "project_id" => 1,
    "persona" => $persona,
    "chat" => $chat
];

echo json_encode($response, JSON_PRETTY_PRINT);
