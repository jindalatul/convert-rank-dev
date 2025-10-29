<?php
$BANK_LLM = [
  'industry' => [
    'key'=>'industry','q'=>'Which industry do you mainly serve or what service do you offer?',
    'hint'=>'Short and specific is best. Example: "roofing contractor", "speech therapy clinic".',
    'mode'=>'chips+input','multi'=>false,'allowCustom'=>true,'options'=>[]
  ],
  'ideal_audience' => [
    'key'=>'ideal_audience','q'=>'Who do you most want to serve right now?',
    'hint'=>'Name the segment that best matches your work. Example: "homeowners with leaks", "parents of toddlers".',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[]
  ],
  'primary_goal' => [
    'key'=>'primary_goal','q'=>'What is your main goal for the next 3–6 months?',
    'hint'=>'1 clear outcome. Example: "book 20 evals/month", "rank top 3 for local searches".',
    'mode'=>'chips+input','multi'=>false,'allowCustom'=>true,'options'=>[]
  ],
  'authority_topics' => [
    'key'=>'authority_topics','q'=>'Which topics or services do you want to be known for?',
    'hint'=>'Pick 1–3 short areas. Example: "metal roof repair", "stuttering therapy".',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[]
  ],
  'buyer_language' => [
    'key'=>'buyer_language','q'=>'Which phrases do prospects use before contacting you?',
    'hint'=>'Short real phrases. Example: "roof leak fix", "help my child stutters".',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[]
  ],
  'seed_keywords' => [
    'key'=>'seed_keywords','q'=>'Pick 2–4 short seed topics (2–3 words).',
    'hint'=>'If relevant, first type 3–5 buyer phrases (comma-separated), then choose 2–4 seed topics (2–3 words).',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[], 'maxChoices'=>4
  ],
];

// ----- Simple bank (for LLM-off journeys; fully deterministic) -----
$BANK_SIMPLE = [
  'industry' => [
    'key'=>'industry',
    'q'=>'What is your main service or industry?',
    'hint'=>'One clear phrase works best.',
    'mode'=>'chips+input','multi'=>false,'allowCustom'=>true,'options'=>['roofing contractor','speech therapy','family law','yoga studio']
  ],
  'ideal_audience' => [
    'key'=>'ideal_audience',
    'q'=>'Who is your ideal customer?',
    'hint'=>'Give 1–2 short audience types.',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>['homeowners','parents','b2b buyers','startups']
  ],
  'primary_goal' => [
    'key'=>'primary_goal',
    'q'=>'Your #1 goal for the next 3–6 months?',
    'hint'=>'One outcome in a short phrase.',
    'mode'=>'chips+input','multi'=>false,'allowCustom'=>true,'options'=>['more leads','rank locally','book consults','increase demos']
  ],
  'authority_topics' => [
    'key'=>'authority_topics',
    'q'=>'Which topics/services do you want authority in?',
    'hint'=>'Pick 1–3 short topics.',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>['roof repair','roof replacement','child speech','seo audits','content strategy']
  ],
  'buyer_language' => [
    'key'=>'buyer_language',
    'q'=>'Common phrases buyers say or search?',
    'hint'=>'Short phrases buyers use.',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>['roof leak fix','speech therapy near me','b2b seo pricing','family lawyer fees']
  ],
  'seed_keywords' => [
    'key'=>'seed_keywords',
    'q'=>'Choose 2–4 seed topics (2–3 words).',
    'hint'=>'Short, query-ready topics.',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>['roof leak repair','pediatric speech therapy','b2b seo services','family law attorney'], 'maxChoices'=>4
  ],
];
?>

