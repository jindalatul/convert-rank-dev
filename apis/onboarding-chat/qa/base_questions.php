<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");   // allow local dev calls

// ---- Phase-1 static questions ---- //
$qa  = [
  [
    'key'=>'industry',
    'intent'=>'collect primary industry',
    'q'=>'Which industry or field do you mainly work in?',
    'hint'=>'Examples: legal, construction, healthcare, real estate, SaaS, coaching, or e-commerce.',
    'mode'=>'chips+input',
    'multi'=>false,
    'allowCustom'=>true,
    // 'maxChoices'=>1, // not needed for single-select
    'options'=>['B2B SaaS','Healthcare','Legal','Construction','E-commerce','Education','Real Estate','Finance'],
    'required'=>true,
  ],
  [
    'key' => 'offering_type',
    'intent' => 'understand business model (service, product, or tool)',
    'q' => 'What do you mainly provide to your customers?',
    'hint' => 'Examples: services (like plumbing, legal help, or therapy, medical condition treatment), sell products (like skincare kits), or sell software/tools (like SaaS apps or CRM platforms).',
    'mode' => 'chips+input',
    'multi' => false,
    'allowCustom' => true,
    'options' => ['service','product','software or tool','consulting','training or course'],
    'required' => true
  ],
  [
    'key'=>'offering_details',
    'intent'=>'understand what the offer does',
    'q'=>'In one short line, what do you offer or help your clients with?',
    'hint'=>"Examples: ‘I install tankless water heaters.’ • ‘SEO for SaaS companies.’ • ‘Legal help for accident victims.’ • ‘I am doctor, offering treatment for heart disease.’ • ‘We sell natural skincare kits.’ • ‘Project-management software for agencies.’",
    'mode' => 'text',
    'multi' => false,
    'allowCustom' => true,
    'options' => [], // keep empty for text mode
    'required' => true
  ],
  [
    'key' => 'ideal_audience',
    'intent' => 'identify the ideal customer, client, or user segment',
    'q' => 'Who is your ideal customer or client?',
    'hint' => 'Short phrases are perfect. Examples: homeowners, car accident victims, injured workers, small-business owners, parents, local patients, enterprise teams, startup founders.',
    'mode' => 'text',
    'multi' => false,
    'allowCustom' => true,
    'options' => [],
    'required' => true
  ],
  [
    'key' => 'primary_goal',
    'intent' => 'identify the main growth or marketing goal for the next 3–6 months',
    'q' => 'What’s your main business goal for the next 3 to 6 months?',
    'hint' => 'Examples: get more leads, increase website traffic, attract higher-value clients, expand into a new area, launch a new product, or build your reputation as an expert.',
    'mode' => 'chips+input',
    'multi' => true,
    'allowCustom' => true,
    'maxChoices' => 3,
    'options' => [
      'get more leads',
      'increase website traffic',
      'build brand authority',
      'launch a new service or product',
      'expand into a new market',
      'improve online visibility',
      'rank higher on search',
      'grow social media presence',
      'increase client retention',
      'generate more reviews or testimonials'
    ],
    'required' => true
  ],
  [
    'key' => 'seed_keywords',
    'intent' => 'collect 2–4 core non-branded topics to drive keyword research',
    'q' => 'Pick 2 to 4 short topics or seed keywords you want to build authority or rank for.',
    'hint' => 'Examples: local SEO, personal injury lawyer, water heater repair, B2B content marketing, family therapy, real estate investing. Keep them 2–3 words, non-branded, and focused on what you want to be found for.',
    'mode' => 'chips+input',
    'multi' => true,
    'allowCustom' => true,
    'maxChoices' => 4,
    'options' => [], // LLM will auto-generate contextual chips
    'required' => true
  ]
];
echo json_encode(['ok'=>true, 'qa'=>$qa], JSON_UNESCAPED_UNICODE);
?>
