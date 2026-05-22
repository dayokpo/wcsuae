<?php
/**
 * Template Name: Homepage
 */
get_header();
?>
<main id="main">

<!-- ================================================================
     HERO
     ================================================================ -->
<section id="hero" class="hero" aria-label="Hero">
  <div class="hero__bg" aria-hidden="true"></div>
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="hero__particles" id="particles" aria-hidden="true"></div>
  <div class="hero__content">
    <div class="container">
      <div class="hero__inner">
        <div>
          <div class="hero__eyebrow reveal"><?php echo esc_html( wcs_field('hero_eyebrow','Abu Dhabi, UAE · Water & Carbon Solutions LLC') ); ?></div>
          <h1 class="hero__heading reveal reveal-delay-1">
            <?php echo esc_html( wcs_field('hero_heading_line1','Environmental performance,') ); ?><br>
            <em><?php echo esc_html( wcs_field('hero_heading_line2','built on water') ); ?></em>
          </h1>
          <p class="hero__sub reveal reveal-delay-2">
            <?php echo esc_html( wcs_field('hero_sub','WCS delivers comprehensive water conservation, environmental compliance, and sustainability services for governments, developers, asset owners, and private clients across Abu Dhabi and the wider region.') ); ?>
          </p>
          <div class="hero__actions reveal reveal-delay-3">
            <a href="<?php echo esc_url( wcs_field('hero_btn1_url','#contact') ); ?>" class="btn btn--primary">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              <?php echo esc_html( wcs_field('hero_btn1_text','Discuss Your Project') ); ?>
            </a>
            <a href="<?php echo esc_url( wcs_field('hero_btn2_url','#services') ); ?>" class="btn btn--outline">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 8 16 12 12 16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
              <?php echo esc_html( wcs_field('hero_btn2_text','View Services') ); ?>
            </a>
          </div>
          <p class="hero__tagline reveal reveal-delay-4">
            <strong><?php echo esc_html( wcs_field('hero_tagline_quote','"To give each plant as much water as it needs — but not more."') ); ?></strong><br>
            <?php echo esc_html( wcs_field('hero_tagline_sub','That precision underpins everything we do, from irrigation engineering to broader environmental stewardship.') ); ?>
          </p>
        </div>
        <div class="hero__visual reveal reveal-delay-2">
          <div class="hero__stat-card">
            <div class="stat-grid">
              <div class="stat-cell">
                <div class="stat-num"><?php echo esc_html( wcs_field('stat1_num','15M') ); ?></div>
                <div class="stat-label"><?php echo esc_html( wcs_field('stat1_label','m³ Water Saved') ); ?></div>
                <div class="stat-sub"><?php echo esc_html( wcs_field('stat1_sub','Tarsheed programme, Abu Dhabi') ); ?></div>
              </div>
              <div class="stat-cell">
                <div class="stat-num stat-num--sm"><?php echo esc_html( wcs_field('stat2_num','AED 156M') ); ?></div>
                <div class="stat-label"><?php echo esc_html( wcs_field('stat2_label','Savings Value') ); ?></div>
                <div class="stat-sub"><?php echo esc_html( wcs_field('stat2_sub','Verified across programme') ); ?></div>
              </div>
              <div class="stat-cell">
                <div class="stat-num stat-num--sm"><?php echo esc_html( wcs_field('stat3_num','35–50%') ); ?></div>
                <div class="stat-label"><?php echo esc_html( wcs_field('stat3_label','Typical Reduction') ); ?></div>
                <div class="stat-sub"><?php echo esc_html( wcs_field('stat3_sub','In irrigation water demand') ); ?></div>
              </div>
              <div class="stat-cell">
                <div class="stat-num stat-num--sm"><?php echo esc_html( wcs_field('stat4_num','45%') ); ?></div>
                <div class="stat-label"><?php echo esc_html( wcs_field('stat4_label','Groundwater Potential') ); ?></div>
                <div class="stat-sub"><?php echo esc_html( wcs_field('stat4_sub','Active DoE advisory project') ); ?></div>
              </div>
            </div>
            <div class="hero__tags">
              <?php
              $tag_defaults = ['Estidama','LEED','BREEAM','WELL','EAD','ISO 14001','UAE Net Zero 2050'];
              for ($i=1;$i<=7;$i++) {
                $tag = wcs_field('hero_tag_'.$i, $tag_defaults[$i-1]);
                if ($tag) echo '<span class="hero__tag">'.esc_html($tag).'</span>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================================================================
     PROOF BAR
     ================================================================ -->
<div class="proof" role="region" aria-label="Service pillars">
  <div class="container">
    <div class="proof__inner">
      <?php
      $proof_defaults = [
        1 => ['Water',       'Conservation & Advisory',    'Irrigation engineering, DSM, groundwater, and water reuse strategies'],
        2 => ['Carbon',      'Management & ESG',           'Carbon planning, ESG assurance, and decarbonisation strategy'],
        3 => ['Environment', 'Compliance & Reporting',     'EIA, CEMP, WMP, and full regulatory alignment with EAD'],
        4 => ['Certification','Advisory & Support',        'Estidama, LEED, BREEAM, WELL, and UAE Net Zero 2050'],
      ];
      for ($i=1;$i<=4;$i++) : $d=$proof_defaults[$i]; $delay=$i>1?' reveal-delay-'.($i-1):''; ?>
        <div class="proof__item reveal<?php echo esc_attr($delay); ?>">
          <div class="proof__number"><?php echo esc_html( wcs_field("proof_{$i}_number",$d[0]) ); ?></div>
          <div class="proof__label"><?php echo esc_html( wcs_field("proof_{$i}_label",$d[1]) ); ?></div>
          <div class="proof__sub"><?php echo esc_html( wcs_field("proof_{$i}_sub",$d[2]) ); ?></div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</div>

<!-- ================================================================
     ABOUT
     ================================================================ -->
<section id="about" class="about" aria-labelledby="about-heading">
  <div class="container">
    <div class="about__grid">
      <div>
        <span class="section-label reveal"><?php echo esc_html( wcs_field('about_label','About WCS') ); ?></span>
        <h2 class="section-heading reveal reveal-delay-1" id="about-heading"><?php echo esc_html( wcs_field('about_heading','A comprehensive platform for water and environmental performance') ); ?></h2>
        <div class="about__body reveal reveal-delay-2">
          <p><?php echo esc_html( wcs_field('about_body_1','WCS – Water & Carbon Solutions LLC is an Abu Dhabi-based specialist firm delivering comprehensive water conservation, environmental compliance, and sustainability services across the full project lifecycle. We serve governments, utilities, developers, asset owners, and private clients who want to reduce resource use, meet regulatory requirements, and achieve measurable environmental outcomes.') ); ?></p>
          <p><?php echo esc_html( wcs_field('about_body_2','Our work directly supports UAE national priorities — Net Zero 2050, UAE Water Security Strategy 2036, Estidama, and EAD requirements — by transforming how resources are managed, monitored, and reported across landscapes and built environments.') ); ?></p>
        </div>
        <div class="about__pillars reveal reveal-delay-3">
          <?php
          $pillar_defaults = [
            1 => ['💧','Water Conservation',    'Irrigation engineering, DSM, groundwater advisory, and water reuse strategies'],
            2 => ['🌿','Environmental Services','EIA, CEMP, WMP, and full compliance with EAD and MOCCAE requirements'],
            3 => ['🏆','Certification Support', 'Estidama, LEED, BREEAM, WELL, and Al Sa\'fat advisory across all stages'],
            4 => ['📈','Carbon & ESG',          'Carbon management planning, ESG assurance, and sustainability reporting'],
          ];
          for ($i=1;$i<=4;$i++) : $d=$pillar_defaults[$i]; ?>
            <div class="pillar">
              <div class="pillar__icon"><?php echo wcs_field("pillar_{$i}_icon",$d[0]); ?></div>
              <div class="pillar__title"><?php echo esc_html( wcs_field("pillar_{$i}_title",$d[1]) ); ?></div>
              <div class="pillar__text"><?php echo esc_html( wcs_field("pillar_{$i}_text",$d[2]) ); ?></div>
            </div>
          <?php endfor; ?>
        </div>
        <div class="about__awards reveal reveal-delay-4">
          <div class="about__awards-label"><?php echo esc_html( wcs_field('awards_label','Industry Recognition — WCS Leadership Team') ); ?></div>
          <?php for ($i=1;$i<=2;$i++) : $award = wcs_field("award_{$i}", $i===1 ? 'Ministry of Energy & Infrastructure — Research & Innovation Award' : 'TAQA — Sustainability Award'); if ($award) : ?>
            <div class="about__award"><?php echo esc_html($award); ?></div>
          <?php endif; endfor; ?>
        </div>
      </div>
      <div class="reveal reveal-delay-2">
        <div style="background:var(--bg-2);border:1px solid var(--border);border-radius:14px;overflow:hidden;">
          <?php $about_img = wcs_img('about_image','tarsheed.jpg'); ?>
          <img src="<?php echo esc_url($about_img['url']); ?>" alt="<?php echo esc_attr($about_img['alt'] ?: 'Landscape water conservation — Abu Dhabi'); ?>" style="width:100%;aspect-ratio:4/3;object-fit:cover;filter:brightness(.8) saturate(.7);" loading="lazy" />
          <div style="padding:1.5rem;">
            <div style="font-size:.68rem;letter-spacing:.12em;text-transform:uppercase;color:var(--cyan);font-weight:700;margin-bottom:.5rem;"><?php echo esc_html( wcs_field('about_card_label','Tarsheed Programme · Abu Dhabi DSM') ); ?></div>
            <div style="font-size:.85rem;color:var(--text-2);line-height:1.6;"><?php echo esc_html( wcs_field('about_card_body','WCS Managing Director Christoph Kayser served as programme lead on the Tarsheed Abu Dhabi DSM initiative — coordinating consultant and contractor teams that together delivered over 15 million cubic metres in verified water savings across Abu Dhabi\'s public landscape assets. That programme experience shapes how WCS approaches every engagement.') ); ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================================================================
     SERVICES
     ================================================================ -->
<section id="services" class="services" aria-labelledby="services-heading">
  <div class="container">
    <div class="services__header">
      <div>
        <span class="section-label reveal"><?php echo esc_html( wcs_field('services_label','What We Do') ); ?></span>
        <h2 class="section-heading reveal reveal-delay-1" id="services-heading"><?php echo esc_html( wcs_field('services_heading','Full-spectrum water and environmental services') ); ?></h2>
      </div>
      <div class="services__tabs reveal reveal-delay-2" role="tablist" aria-label="Service categories">
        <button class="tab-btn active" role="tab" aria-selected="true" data-tab="water"><?php echo esc_html( wcs_field('tab1_label','Water Solutions') ); ?></button>
        <button class="tab-btn" role="tab" aria-selected="false" data-tab="sustainability"><?php echo esc_html( wcs_field('tab2_label','Sustainability & Environmental') ); ?></button>
      </div>
    </div>

    <!-- Water Panel -->
    <div class="services__panel active" id="panel-water" role="tabpanel">
      <div class="services__grid">
        <?php
        $water_defaults = [
          ['🔍','Irrigation Audits & Assessments','Full landscape audits, leak detection, and benchmarking against actual plant water demand. ISO 46001:2019 compliant.'],
          ['⚙️','Smart Irrigation Design & Upgrades','Precision irrigation design and implementation — sensors, weather-based controllers, GIS mapping, pressure regulation. 30–50% savings target.'],
          ['📊','Demand-Side Management','Real-time monitoring, remote dashboards, and ongoing water auditing with monthly M&V reporting to DOE/ADWEA standards.'],
          ['💰','Performance-Based Contracting','DBOM and shared-savings contracts — zero upfront cost, repayment structured from verified savings over the contract period.'],
          ['♻️','Alternative Water Source Integration','Greywater reuse, treated wastewater integration, and strategic water source planning aligned with UAE Water Strategy 2036 reuse targets.'],
          ['🌾','Soil, Planting & Xeriscape Optimisation','Species selection, soil science, and drought-tolerant design that reduces water demand without compromising landscape quality.'],
          ['🏔️','Groundwater Conservation Advisory','Abstraction assessment, water quality analysis, irrigation network rehabilitation, and conservation strategy for public-sector clients.'],
          ['🔧','Long-Term Operations & Compliance','End-to-end O&M, certified savings reports, and ongoing performance verification — full accountability from diagnosis to 5+ year performance.'],
          ['🏠','Residential Water Efficiency','Tailored water assessments and irrigation upgrades for private homes, villas, and estates — reduce consumption, lower bills, protect your garden.'],
        ];
        $delays = ['','reveal-delay-1','reveal-delay-2','','reveal-delay-1','reveal-delay-2','','reveal-delay-1','reveal-delay-2'];
        for ($i=1;$i<=9;$i++) : $d=$water_defaults[$i-1]; $delay=$delays[$i-1]; ?>
          <div class="service-card reveal<?php echo $delay?' '.$delay:''; ?>">
            <div class="service-card__icon"><?php echo wcs_field("ws{$i}_icon",$d[0]); ?></div>
            <div class="service-card__title"><?php echo esc_html( wcs_field("ws{$i}_title",$d[1]) ); ?></div>
            <div class="service-card__desc"><?php echo esc_html( wcs_field("ws{$i}_desc",$d[2]) ); ?></div>
          </div>
        <?php endfor; ?>
      </div>
    </div>

    <!-- Sustainability Panel -->
    <div class="services__panel" id="panel-sustainability" role="tabpanel">
      <div class="services__grid">
        <?php
        $sust_defaults = [
          ['📋','Sustainability Management Plans','SMP development, sustainability reporting, and ongoing performance monitoring for projects and organisations.'],
          ['🗑️','Waste Management Plans','Compliant WMP preparation for development projects aligned with EAD and municipal requirements.'],
          ['🔬','Environmental Impact Assessments','Full EIA scope including environmental surveys, natural systems assessment, and regulatory submission support.'],
          ['🏗️','Construction Environmental Management','CEMP preparation and site-level environmental compliance management throughout the construction phase.'],
          ['🏆','Green Building Certification Advisory','Estidama Pearl, LEED, BREEAM, and WELL certification support across design, construction, and operations.'],
          ['🌱','Carbon Management Planning','Carbon footprint assessment, reduction pathways, and management plans aligned with UAE Net Zero 2050 goals.'],
          ['📈','ESG Assurance & Reporting','ESG framework advisory, GRI-aligned reporting, and assurance services for corporate and developer clients.'],
          ['⚡','Energy & Performance Modelling','Energy audits, performance modelling, and renewable energy integration advisory aligned with sustainability targets.'],
          ['🏠','Residential Sustainability Advisory','Help homeowners reduce water and carbon footprints through practical, cost-effective interventions tailored to their property.'],
        ];
        for ($i=1;$i<=9;$i++) : $d=$sust_defaults[$i-1]; $delay=$delays[$i-1]; ?>
          <div class="service-card reveal<?php echo $delay?' '.$delay:''; ?>">
            <div class="service-card__icon"><?php echo wcs_field("ss{$i}_icon",$d[0]); ?></div>
            <div class="service-card__title"><?php echo esc_html( wcs_field("ss{$i}_title",$d[1]) ); ?></div>
            <div class="service-card__desc"><?php echo esc_html( wcs_field("ss{$i}_desc",$d[2]) ); ?></div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</section>

<!-- ================================================================
     PROCESS
     ================================================================ -->
<section id="process" class="process" aria-labelledby="process-heading">
  <div class="container">
    <div class="process__intro">
      <span class="section-label reveal"><?php echo esc_html( wcs_field('process_label','How We Work') ); ?></span>
      <h2 class="section-heading reveal reveal-delay-1" id="process-heading"><?php echo esc_html( wcs_field('process_heading','Our water conservation process') ); ?></h2>
      <p class="section-sub reveal reveal-delay-2"><?php echo esc_html( wcs_field('process_sub','From first site visit to long-term verified performance — our six-step process ensures every water conservation engagement delivers real, measurable, and sustained results.') ); ?></p>
      <div class="process__scope-note reveal reveal-delay-3"><?php echo esc_html( wcs_field('process_note','Water conservation engagements follow this structured six-step delivery model') ); ?></div>
    </div>
    <div class="process__steps">
      <?php
      $step_defaults = [
        1 => ['Initial Assessment',       'Full landscape and irrigation audit — flow measurement, leak detection, controller analysis, and benchmarking against actual plant water requirements.'],
        2 => ['Performance Baseline',     'Establish a verified consumption baseline with M&V protocols in place. Data-driven, defensible, and ready for performance contracting.'],
        3 => ['Solution Design',          'Custom system design combining smart irrigation technology, scheduling optimisation, soil management, and xeriscape strategy — calibrated to the site.'],
        4 => ['Implementation',           'Technical delivery of upgrades, hardware installation, system integration, and staff training. Low disruption, high accountability.'],
        5 => ['Monitoring & Verification','Real-time dashboards, remote monitoring, and monthly M&V reporting to DOE/ADWEA standards — verified savings, not estimates.'],
        6 => ['Long-Term Performance',    'Ongoing O&M, compliance reporting, and continuous optimisation. Full accountability through the life of the engagement.'],
      ];
      $step_delays=['','reveal-delay-1','reveal-delay-2','','reveal-delay-1','reveal-delay-2'];
      for ($i=1;$i<=6;$i++) : $d=$step_defaults[$i]; $delay=$step_delays[$i-1]; ?>
        <div class="step reveal<?php echo $delay?' '.$delay:''; ?>">
          <div class="step__num"><?php printf('%02d',$i); ?></div>
          <div class="step__title"><?php echo esc_html( wcs_field("step{$i}_title",$d[0]) ); ?></div>
          <div class="step__desc"><?php echo esc_html( wcs_field("step{$i}_desc",$d[1]) ); ?></div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- ================================================================
     SAVINGS ESTIMATOR CTA
     ================================================================ -->
<div class="savings-cta" role="region" aria-label="Savings estimator">
  <div class="container" style="padding-block:3rem;">
    <div class="savings-cta__inner reveal">
      <div class="savings-cta__text">
        <h3><?php echo esc_html( wcs_field('cta_heading','Estimate your water savings potential') ); ?></h3>
        <p><?php echo esc_html( wcs_field('cta_body','Enter your landscaped area, property type, and current water use — our calculator gives you a ballpark figure for what WCS could save you in m³ and AED per year.') ); ?></p>
      </div>
      <div class="savings-cta__action">
        <a href="<?php echo esc_url( wcs_field('cta_btn_url', home_url('/calculator')) ); ?>" class="btn btn--primary">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 6h8M8 10h8M8 14h4"/></svg>
          <?php echo esc_html( wcs_field('cta_btn_text','Open Savings Calculator') ); ?>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- ================================================================
     TEAM EXPERIENCE / EXPERTISE
     ================================================================ -->
<section id="expertise" class="expertise" aria-labelledby="expertise-heading">
  <div class="container">
    <span class="section-label reveal"><?php echo esc_html( wcs_field('expertise_label','Team Experience') ); ?></span>
    <h2 class="section-heading reveal reveal-delay-1" id="expertise-heading"><?php echo esc_html( wcs_field('expertise_heading','Proven delivery. Credible people.') ); ?></h2>
    <p class="section-sub reveal reveal-delay-2"><?php echo esc_html( wcs_field('expertise_sub','WCS is a new company. The experience that backs it is not.') ); ?></p>

    <div class="expertise__disclaimer reveal reveal-delay-3">
      <strong>Note on attribution:</strong> <?php echo esc_html( wcs_field('expertise_disclaimer','The project examples and programme references below represent work undertaken by members of the WCS leadership team in previous roles at other organisations, prior to the founding of WCS. They are presented solely to illustrate the personal experience, technical leadership, and delivery capabilities of our team. WCS does not claim company authorship or ownership of these projects. All rights to project materials, images, and intellectual property remain with their respective firms and owners.') ); ?>
    </div>

    <div class="expertise__grid">

      <!-- Exp Card 1 -->
      <?php $img1 = wcs_img('exp1_image','tarsheed.jpg'); ?>
      <div class="exp-card reveal">
        <img src="<?php echo esc_url($img1['url']); ?>" alt="<?php echo esc_attr($img1['alt'] ?: 'Tarsheed Abu Dhabi irrigation optimisation programme'); ?>" class="exp-card__photo" loading="lazy" />
        <div class="exp-card__type"><?php echo esc_html( wcs_field('exp1_type','Water Conservation · Abu Dhabi DSM') ); ?></div>
        <div class="exp-card__title"><?php echo esc_html( wcs_field('exp1_title','Tarsheed Programme — Irrigation Optimisation') ); ?></div>
        <div class="exp-card__desc"><?php echo esc_html( wcs_field('exp1_desc','WCS Managing Director Christoph Kayser served as programme lead on the pilot and limited implementation phase of a large-scale irrigation optimisation initiative across Abu Dhabi\'s tariff-exempted landscape assets — part of a multi-hundred-million-dirham DSM strategy launched by the Department of Energy. Mr Kayser coordinated the consultant and contractor teams that delivered verified water savings across the Emirate over a four-year period.') ); ?></div>
        <div class="exp-card__metric"><strong><?php echo esc_html( wcs_field('exp1_metric_strong','35–40% reduction in potable water use') ); ?></strong><?php echo esc_html( wcs_field('exp1_metric_text','Over 3 million cubic metres saved within 4 years. All outcomes validated via comprehensive M&V protocols.') ); ?></div>
      </div>

      <!-- Exp Card 2 -->
      <?php $img2 = wcs_img('exp2_image','forest.jpg'); ?>
      <div class="exp-card reveal reveal-delay-1">
        <img src="<?php echo esc_url($img2['url']); ?>" alt="<?php echo esc_attr($img2['alt'] ?: 'Al Ain forest groundwater conservation advisory'); ?>" class="exp-card__photo" loading="lazy" />
        <div class="exp-card__type"><?php echo esc_html( wcs_field('exp2_type','Groundwater Advisory · Active Project · DoE Abu Dhabi') ); ?></div>
        <div class="exp-card__title"><?php echo esc_html( wcs_field('exp2_title','Forest Groundwater Conservation — Al Ain') ); ?></div>
        <div class="exp-card__desc"><?php echo esc_html( wcs_field('exp2_desc','An ongoing advisory project for the Department of Energy (Abu Dhabi) targeting a desert forest of over 20,000 trees in Al Ain, where landscape performance was constrained by inefficient irrigation and reliance on highly saline groundwater. WCS is conducting groundwater abstraction quantification, water quality assessment, irrigation network rehabilitation, and intervention design.') ); ?></div>
        <div class="exp-card__metric"><strong><?php echo esc_html( wcs_field('exp2_metric_strong','45–50% reduction potential identified') ); ?></strong><?php echo esc_html( wcs_field('exp2_metric_text','Interventions in development. Final outcomes subject to full implementation.') ); ?></div>
      </div>

      <!-- Exp Card 3 -->
      <?php $img3 = wcs_img('exp3_image','alghadeer.jpg'); ?>
      <div class="exp-card reveal">
        <img src="<?php echo esc_url($img3['url']); ?>" alt="<?php echo esc_attr($img3['alt'] ?: 'Residential community performance-based irrigation optimisation'); ?>" class="exp-card__photo" loading="lazy" />
        <div class="exp-card__type"><?php echo esc_html( wcs_field('exp3_type','Water Conservation · Residential Community') ); ?></div>
        <div class="exp-card__title"><?php echo esc_html( wcs_field('exp3_title','Prominent Residential Community — Performance-Based Irrigation') ); ?></div>
        <div class="exp-card__desc"><?php echo esc_html( wcs_field('exp3_desc','Team members contributed to delivery of a performance-based water conservation contract for a prominent residential community in Abu Dhabi. The project optimised an irrigation network with baseline consumption of approximately 1,800 m³/day, combining night cycle scheduling, weather station integration, and soil moisture and leak-detection sensors.') ); ?></div>
        <div class="exp-card__metric"><strong><?php echo esc_html( wcs_field('exp3_metric_strong','1,800 → ~1,100 m³/day') ); ?></strong><?php echo esc_html( wcs_field('exp3_metric_text','Up to 50% savings achieved in peak months. Replicable model for community water efficiency.') ); ?></div>
      </div>

      <!-- Exp Card 4 -->
      <div class="exp-card reveal reveal-delay-1">
        <?php $img4 = wcs_field('exp4_image',[]); ?>
        <?php if (!empty($img4['url'])) : ?>
          <img src="<?php echo esc_url($img4['url']); ?>" alt="<?php echo esc_attr($img4['alt']); ?>" class="exp-card__photo" loading="lazy" />
        <?php else : ?>
          <div class="exp-card__photo-placeholder">🌿</div>
        <?php endif; ?>
        <div class="exp-card__type"><?php echo esc_html( wcs_field('exp4_type','Sustainability & Environmental Services · Abu Dhabi') ); ?></div>
        <div class="exp-card__title"><?php echo esc_html( wcs_field('exp4_title','Landmark Environmental & Sustainability Projects') ); ?></div>
        <div class="exp-card__desc"><?php echo esc_html( wcs_field('exp4_desc','WCS Business Development Director Dr. Firas Fayssal led environmental and sustainability services on a number of landmark Abu Dhabi projects in a previous role, covering EIA, CEMP, WMP, Sustainability Management Plans, and green building certification advisory. These engagements reflect Dr. Fayssal\'s personal expertise in compliance delivery and certification across complex, high-profile built environment projects.') ); ?></div>
        <div class="exp-card__metric"><strong><?php echo esc_html( wcs_field('exp4_metric_strong','LEED · Estidama · BREEAM') ); ?></strong><?php echo esc_html( wcs_field('exp4_metric_text','Certification advisory across multiple completed Abu Dhabi projects.') ); ?></div>
      </div>
    </div>

    <!-- International Advisory -->
    <div style="margin-top:3rem;">
      <h3 class="section-heading reveal" style="font-size:clamp(1.4rem,2.5vw,1.9rem);margin-bottom:.75rem;"><?php echo esc_html( wcs_field('intl_heading','International Advisory Experience') ); ?></h3>
      <p class="section-sub reveal reveal-delay-1" style="margin-bottom:2rem;"><?php echo esc_html( wcs_field('intl_sub','WCS leadership has contributed to water policy, climate adaptation, and sustainability programmes at an international scale through previous engagements with global institutions.') ); ?></p>
      <div class="expertise__intl">
        <?php
        $intl_defaults = [
          1 => ['UNDP · United Nations Development Programme','Jordan Water Efficiency Regulatory Framework','As Climate Policy Advisors and UNDP collaborators, in partnership with Jordan\'s Ministry of Water and Irrigation, team members contributed to Jordan\'s national water efficiency regulatory framework — integrating climate change adaptation into water policy and supporting multi-million USD Green Climate Fund projects focused on sustainable water management.'],
          2 => ['USAID · Regional Water Programme','Wastewater Energy Benchmarking & Water Reuse','In collaboration with USAID, ministries, and municipalities across Lebanon and the broader Mediterranean, team members conducted energy benchmarking for wastewater treatment facilities and introduced resource recovery, sludge-to-energy, and treated effluent reuse programmes — achieving over 35% reduction in freshwater withdrawal at targeted facilities.'],
          3 => ['Abu Dhabi DoE · Research & Innovation','Abu Dhabi Sponge City Prototype','Team members led development of Abu Dhabi\'s first Sponge City prototype — integrating permeable pavements, bioswales, rain gardens, and underground retention systems to achieve 100% stormwater capture and full water circularity, targeting approximately 40% reduction in potable water demand. Aligned with UAE Vision 2030 and Net Zero 2050.'],
        ];
        $delays3=['','reveal-delay-1','reveal-delay-2'];
        for ($i=1;$i<=3;$i++) : $d=$intl_defaults[$i]; ?>
          <div class="intl-card reveal<?php echo $delays3[$i-1]?' '.$delays3[$i-1]:''; ?>">
            <div class="intl-card__org"><?php echo esc_html( wcs_field("intl{$i}_org",$d[0]) ); ?></div>
            <div class="intl-card__title"><?php echo esc_html( wcs_field("intl{$i}_title",$d[1]) ); ?></div>
            <div class="intl-card__desc"><?php echo esc_html( wcs_field("intl{$i}_desc",$d[2]) ); ?></div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</section>

<!-- ================================================================
     CLIENTS
     ================================================================ -->
<section class="clients" aria-label="Previous client organisations">
  <div class="container">
    <span class="section-label reveal"><?php echo esc_html( wcs_field('clients_label','Previous Client Organisations') ); ?></span>
    <h2 class="section-heading reveal reveal-delay-1"><?php echo esc_html( wcs_field('clients_heading','Work delivered across leading organisations') ); ?></h2>
    <p class="section-sub reveal reveal-delay-2"><?php echo esc_html( wcs_field('clients_note','Referenced to illustrate the experience of WCS leadership, not WCS company credentials.') ); ?></p>
    <div class="clients__logos reveal reveal-delay-3">
      <?php
      $client_defaults = ['Abu Dhabi Department of Energy','TAQA','Aldar Properties','UNDP','USAID','Jordan Ministry of Water & Irrigation','Masdar','Abu Dhabi Municipality'];
      for ($i=1;$i<=8;$i++) : $name = wcs_field("client_{$i}",$client_defaults[$i-1]); if ($name) : ?>
        <span class="client-pill"><?php echo esc_html($name); ?></span>
      <?php endif; endfor; ?>
    </div>
  </div>
</section>

<!-- ================================================================
     ACCREDITATIONS
     ================================================================ -->
<section id="accreditations" class="accreditations" aria-labelledby="accred-heading">
  <div class="container">
    <span class="section-label reveal"><?php echo esc_html( wcs_field('accred_label','Prequalifications & Accreditations') ); ?></span>
    <h2 class="section-heading reveal reveal-delay-1" id="accred-heading"><?php echo esc_html( wcs_field('accred_heading','Recognised by the frameworks our clients work within') ); ?></h2>
    <p class="section-sub reveal reveal-delay-2"><?php echo esc_html( wcs_field('accred_sub','WCS is prequalified and accredited by leading local and international bodies, ensuring full regulatory compliance and delivery credibility across environmental, sustainability, and water conservation services.') ); ?></p>
    <div class="accred__grid reveal reveal-delay-3">
      <?php
      $accred_defaults = ['Estidama','MOCCAE','ISO 14001','LEED / USGBC','BREEAM','GRI','Green Flag Award','Al Sa\'fat','NEBOSH','OSHA','Darksky Approved','SAHEL'];
      for ($i=1;$i<=12;$i++) : $pill = wcs_field("accred_{$i}",$accred_defaults[$i-1]); if ($pill) : ?>
        <span class="accred__pill"><?php echo esc_html($pill); ?></span>
      <?php endif; endfor; ?>
    </div>
  </div>
</section>

<!-- ================================================================
     WHY WCS
     ================================================================ -->
<section id="why" class="why" aria-labelledby="why-heading">
  <div class="container">
    <div class="why__grid">
      <div>
        <span class="section-label reveal"><?php echo esc_html( wcs_field('why_label','Why WCS') ); ?></span>
        <h2 class="section-heading reveal reveal-delay-1" id="why-heading"><?php echo nl2br( esc_html( wcs_field('why_heading',"Technically grounded.\nNot presentation-led.") ) ); ?></h2>
        <div class="why__body reveal reveal-delay-2">
          <p><?php echo esc_html( wcs_field('why_body_1','Most firms are either technical water specialists or broad sustainability consultants. WCS operates credibly across both areas — because our sustainability offer is backed by the discipline of operational water delivery, not advisory frameworks alone.') ); ?></p>
          <p><?php echo esc_html( wcs_field('why_body_2','We have worked on programmes that moved the needle on national water targets. That rigour carries across everything we do — whether the brief is irrigation engineering, a LEED submission, or carbon planning.') ); ?></p>
        </div>
        <div class="why__points reveal reveal-delay-3">
          <?php
          $point_defaults = [
            ['Verified outcomes, not estimates.','Our team has delivered against KPI-linked contracts with M&V protocols — the standard governments and utilities use.'],
            ['Abu Dhabi-native expertise.','Deep familiarity with Estidama, EAD, ADWEA, and UAE Water Security Strategy requirements — built by working inside the system.'],
            ['End-to-end accountability.','Assessment, design, implementation, monitoring, and reporting — all under one roof, with no handover gaps.'],
            ['Relevant at every scale.','From a government DSM programme to a private villa, we bring the same technical discipline to every engagement.'],
          ];
          for ($i=1;$i<=4;$i++) : $d=$point_defaults[$i-1]; ?>
            <div class="why__point">
              <div class="why__point-dot"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <div class="why__point-text"><strong><?php echo esc_html( wcs_field("why_point{$i}_strong",$d[0]) ); ?></strong> <?php echo esc_html( wcs_field("why_point{$i}_text",$d[1]) ); ?></div>
            </div>
          <?php endfor; ?>
        </div>
      </div>
      <div class="why__sectors reveal reveal-delay-2">
        <?php
        $sector_defaults = [
          ['🏛️','Government & Utilities',        'Water security programmes, DSM, regulatory alignment, EIA, and audit-ready performance reporting at scale.'],
          ['🏢','Developers & Asset Owners',     'Lower operating costs, green building certification, protected landscape quality, and environmental performance across residential, commercial, hospitality, and mixed-use portfolios.'],
          ['🏨','Hospitality & Commercial',      'ESG compliance and efficient landscapes without compromising guest experience. Performance reporting aligned with operator, brand, and investor sustainability requirements.'],
          ['🏠','Residential Clients',           'Homeowners and villa owners who want to reduce water consumption, lower utility bills, and contribute to a greener future — practical, affordable, and lasting improvements.'],
        ];
        for ($i=1;$i<=4;$i++) : $d=$sector_defaults[$i-1]; ?>
          <div class="sector">
            <div class="sector__head">
              <div class="sector__icon"><?php echo wcs_field("sector{$i}_icon",$d[0]); ?></div>
              <div class="sector__title"><?php echo esc_html( wcs_field("sector{$i}_title",$d[1]) ); ?></div>
            </div>
            <div class="sector__desc"><?php echo esc_html( wcs_field("sector{$i}_desc",$d[2]) ); ?></div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</section>

<!-- ================================================================
     TEAM
     ================================================================ -->
<section id="team" class="team" aria-labelledby="team-heading">
  <div class="container">
    <span class="section-label reveal"><?php echo esc_html( wcs_field('team_label','The Team') ); ?></span>
    <h2 class="section-heading reveal reveal-delay-1" id="team-heading"><?php echo esc_html( wcs_field('team_heading','Water, environment, and sustainability in one team') ); ?></h2>
    <p class="section-sub reveal reveal-delay-2"><?php echo esc_html( wcs_field('team_sub','Our leadership team combines decades of specialised experience in water conservation, landscape systems, environmental engineering, and sustainability advisory across the UAE and wider MENA region.') ); ?></p>
    <div class="team__grid">
      <?php
      $team = [
        1 => ['Christoph.png','Christoph Kayser',  'Managing Director',          'Decades of experience in sustainable infrastructure and environmental management across the Gulf. Former programme lead on the Tarsheed Abu Dhabi DSM initiative. Leads WCS strategy toward climate-resilient, low-carbon, and water-secure solutions.'],
        2 => ['Firas.png',    'Dr. Firas Fayssal', 'Business Development Director','Deep expertise in climate change, sustainability, and green building certification. Former Climate Policy Advisor to the UNDP in Jordan. Led environmental and sustainability services on landmark UAE projects. Drives WCS strategic partnerships and government engagement.'],
        3 => ['Abhay.png',    'Abhay Mokashi',     'Operations Director',         'Oversees project execution and long-term performance delivery. Ensures full regulatory compliance with EAD, Estidama, and UAE environmental frameworks. Brings operational discipline and technical rigour to every engagement.'],
      ];
      $tdelays=['','reveal-delay-1','reveal-delay-2'];
      for ($i=1;$i<=3;$i++) : $d=$team[$i]; $photo=wcs_img("team{$i}_photo",$d[0]); ?>
        <div class="team-card reveal<?php echo $tdelays[$i-1]?' '.$tdelays[$i-1]:''; ?>">
          <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr( wcs_field("team{$i}_name",$d[1]) ); ?> — <?php echo esc_attr( wcs_field("team{$i}_role",$d[2]) ); ?>, WCS" class="team-card__photo" loading="lazy" />
          <div class="team-card__name"><?php echo esc_html( wcs_field("team{$i}_name",$d[1]) ); ?></div>
          <div class="team-card__role"><?php echo esc_html( wcs_field("team{$i}_role",$d[2]) ); ?></div>
          <div class="team-card__bio"><?php echo esc_html( wcs_field("team{$i}_bio",$d[3]) ); ?></div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- ================================================================
     CONTACT
     ================================================================ -->
<section id="contact" class="contact" aria-labelledby="contact-heading">
  <div class="container">
    <div class="contact__grid">
      <div>
        <span class="section-label reveal"><?php echo esc_html( wcs_field('contact_label','Contact') ); ?></span>
        <h2 class="section-heading reveal reveal-delay-1" id="contact-heading"><?php echo esc_html( wcs_field('contact_heading','Discuss your project') ); ?></h2>
        <p class="section-sub reveal reveal-delay-2"><?php echo esc_html( wcs_field('contact_sub','Whether you have an immediate requirement, a certification programme to support, or simply want to know how much water your property could be saving — we respond within one business day.') ); ?></p>
        <div class="contact__detail reveal reveal-delay-3">
          <div class="contact__detail-icon">📍</div>
          <div class="contact__detail-text"><strong>Location</strong><?php echo esc_html( wcs_field('contact_location','Masdar City, Abu Dhabi, UAE') ); ?></div>
        </div>
        <div class="contact__detail reveal reveal-delay-3">
          <div class="contact__detail-icon">📞</div>
          <div class="contact__detail-text"><strong>Phone</strong>
            <?php $phone = wcs_field('contact_phone','+971 56 927 0100'); ?>
            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/','',$phone)); ?>" style="color:var(--cyan)"><?php echo esc_html($phone); ?></a>
          </div>
        </div>
        <div class="contact__detail reveal reveal-delay-4">
          <div class="contact__detail-icon">✉️</div>
          <div class="contact__detail-text"><strong>Email</strong>
            <?php $email = wcs_field('contact_email','info@wcs-uae.com'); ?>
            <a href="mailto:<?php echo esc_attr($email); ?>" style="color:var(--cyan)"><?php echo esc_html($email); ?></a>
          </div>
        </div>
        <div class="contact__detail reveal reveal-delay-4">
          <div class="contact__detail-icon">🧮</div>
          <div class="contact__detail-text"><strong>Water Savings Calculator</strong>
            <a href="<?php echo esc_url( home_url('/calculator') ); ?>" style="color:var(--cyan)">Estimate your potential savings →</a>
          </div>
        </div>
      </div>
      <div class="reveal reveal-delay-2">
        <div class="form">
          <form id="contactForm" novalidate>
            <?php wp_nonce_field('wcs_contact','wcs_nonce'); ?>
            <div class="form__row">
              <div class="field"><label for="name">Full Name</label><input type="text" id="name" name="name" placeholder="Your name" required autocomplete="name" /></div>
              <div class="field"><label for="org">Organisation</label><input type="text" id="org" name="org" placeholder="Company or property name" /></div>
            </div>
            <div class="form__row">
              <div class="field">
                <label for="sector">Client Type</label>
                <select id="sector" name="sector"><option value="" disabled selected>Select type</option><option value="government">Government / Utility</option><option value="developer">Developer / Asset Owner</option><option value="hospitality">Hospitality / Commercial</option><option value="residential">Residential / Private</option><option value="other">Other</option></select>
              </div>
              <div class="field">
                <label for="service">Service Interest</label>
                <select id="service" name="service"><option value="" disabled selected>Select area</option><option value="water">Water Conservation</option><option value="environmental">Environmental Compliance</option><option value="sustainability">Sustainability Advisory</option><option value="certification">Green Building Certification</option><option value="esg">ESG / Carbon</option><option value="residential_water">Residential Water Efficiency</option><option value="not_sure">Not sure yet</option></select>
              </div>
            </div>
            <div class="form__row">
              <div class="field"><label for="email">Email Address</label><input type="email" id="email" name="email" placeholder="you@company.com" required autocomplete="email" /></div>
              <div class="field"><label for="phone">Phone Number</label><input type="tel" id="phone" name="phone" placeholder="+971 50 000 0000" autocomplete="tel" /></div>
            </div>
            <div class="field"><label for="message">Message</label><textarea id="message" name="message" placeholder="Briefly describe your project, property, or requirement. No detail is too small."></textarea></div>
            <div class="form__submit">
              <button type="submit" class="btn btn--primary">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
                Send Message
              </button>
            </div>
          </form>
          <div class="form__success" id="formSuccess">
            <div class="form__success-icon">✓</div>
            <div style="font-family:var(--font-display);font-size:1.1rem;color:var(--cyan);margin-bottom:.5rem;">Message received</div>
            <p style="font-size:.85rem;color:var(--text-3);">We'll review your submission and respond within one business day. For urgent enquiries, call <?php echo esc_html( wcs_field('contact_phone','+971 56 927 0100') ); ?>.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
