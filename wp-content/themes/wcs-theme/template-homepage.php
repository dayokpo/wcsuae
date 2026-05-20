<?php
/**
 * Template Name: Homepage
 * Description: Full one-page homepage with Hero, About, Projects, Process, Calculator, Contact sections.
 */

get_header();
?>

<main id="main">

<!-- ===================================================
     HERO SECTION
     =================================================== -->
<section id="hero" class="hero" aria-label="Hero">
  <div class="hero__bg" aria-hidden="true"></div>
  <div class="hero__grid-overlay" aria-hidden="true"></div>

  <div class="hero__content">
    <div>
      <?php $eyebrow = wcs_field( 'hero_eyebrow', 'Abu Dhabi, UAE · Est. 2025' ); ?>
      <div class="hero__eyebrow reveal"><?php echo esc_html( $eyebrow ); ?></div>

      <?php $heading = wcs_field( 'hero_heading', "UAE's specialist in\nmeasurable water conservation" ); ?>
      <h1 class="hero__heading reveal reveal-delay-1">
        <?php
        $lines = explode( "\n", $heading );
        if ( count( $lines ) >= 2 ) {
            echo esc_html( $lines[0] ) . '<br><em>' . esc_html( trim( $lines[1] ) ) . '</em>';
        } else {
            echo esc_html( $heading );
        }
        ?>
      </h1>

      <p class="hero__sub reveal reveal-delay-2">
        <?php echo esc_html( wcs_field( 'hero_sub', 'WCS helps commercial property owners, hotels, resorts, and estates reduce outdoor water waste, lower operating costs, and protect landscape quality — through precision irrigation engineering and performance-based delivery.' ) ); ?>
      </p>

      <div class="hero__actions reveal reveal-delay-3">
        <a href="<?php echo esc_url( wcs_field( 'hero_btn1_url', '#contact' ) ); ?>" class="btn btn--primary">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 12h6M9 16h4"/></svg>
          <?php echo esc_html( wcs_field( 'hero_btn1_text', 'Book an Assessment' ) ); ?>
        </a>
        <a href="<?php echo esc_url( wcs_field( 'hero_btn2_url', '/calculator' ) ); ?>" class="btn btn--outline">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 6h8M8 10h8M8 14h4"/></svg>
          <?php echo esc_html( wcs_field( 'hero_btn2_text', 'Estimate My Savings' ) ); ?>
        </a>
      </div>

      <?php
      $strip_items = wcs_field( 'hero_strip_items', [] );
      $default_strip = [
        [ 'text' => 'Abu Dhabi, UAE' ],
        [ 'text' => 'Irrigation Engineering' ],
        [ 'text' => 'Demand-Side Management' ],
        [ 'text' => 'Performance-Based Delivery' ],
        [ 'text' => 'UAE Sustainability Aligned' ],
      ];
      $strip = ! empty( $strip_items ) ? $strip_items : $default_strip;
      ?>
      <div class="hero__strip reveal reveal-delay-4">
        <?php foreach ( $strip as $item ) : ?>
          <div class="hero__strip-item">
            <span class="hero__strip-dot" aria-hidden="true"></span>
            <?php echo esc_html( is_array( $item ) ? $item['text'] : $item ); ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ===================================================
     PROOF NUMBERS
     =================================================== -->
<?php
$proof_items = wcs_field( 'proof_items', [] );
$default_proof = [
  [ 'number' => '15M', 'label' => 'Cubic Metres Saved', 'sub' => 'Verified across delivered projects' ],
  [ 'number' => '156M AED', 'label' => 'Value of Savings Generated', 'sub' => 'Direct operating cost reduction' ],
  [ 'number' => '6,000', 'label' => 'Olympic Pools Equivalent', 'sub' => 'Water preserved, not wasted' ],
];
$proofs = ! empty( $proof_items ) ? $proof_items : $default_proof;
?>
<div class="proof" role="region" aria-label="Impact metrics">
  <div class="proof__inner">
    <?php foreach ( $proofs as $i => $item ) : ?>
      <div class="proof__item reveal<?php echo $i > 0 ? ' reveal-delay-' . $i : ''; ?>">
        <div class="proof__number"><?php echo esc_html( $item['number'] ); ?></div>
        <div class="proof__label"><?php echo esc_html( $item['label'] ); ?></div>
        <div class="proof__sub"><?php echo esc_html( $item['sub'] ); ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ===================================================
     ABOUT SECTION
     =================================================== -->
<section id="about" aria-labelledby="about-heading">
  <div class="container">
    <div class="about__grid">

      <!-- Left: Visual -->
      <div class="about__visual reveal">
        <?php
        $about_image = wcs_field( 'about_image', [] );
        if ( ! empty( $about_image['url'] ) ) :
        ?>
          <img
            src="<?php echo esc_url( $about_image['url'] ); ?>"
            alt="<?php echo esc_attr( $about_image['alt'] ?? 'Precision drip irrigation system in a UAE landscaped environment' ); ?>"
            class="about__visual-img"
            loading="lazy"
            decoding="async"
          />
        <?php else : ?>
          <img
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/about-irrigation.svg' ); ?>"
            alt="Precision drip irrigation system in a UAE landscaped environment"
            class="about__visual-img"
            loading="lazy"
            decoding="async"
          />
        <?php endif; ?>
        <div class="about__visual-overlay" aria-hidden="true"></div>
        <div class="about__visual-stat">
          <div class="about__visual-stat-num"><?php echo esc_html( wcs_field( 'about_stat_num', '35–50%' ) ); ?></div>
          <div class="about__visual-stat-label"><?php echo esc_html( wcs_field( 'about_stat_label', 'Typical potable water reduction per project' ) ); ?></div>
        </div>
      </div>

      <!-- Right: Content -->
      <div>
        <?php wcs_section_label( wcs_field( 'about_section_label', 'About WCS' ) ); ?>
        <h2 id="about-heading" class="section-heading reveal reveal-delay-1">
          <?php echo esc_html( wcs_field( 'about_heading', "Water is the UAE's most critical operating cost you're not controlling" ) ); ?>
        </h2>

        <?php $body1 = wcs_field( 'about_body_1', 'In the Gulf, landscapes consume a disproportionate share of total water use. Irrigation systems are often outdated, poorly calibrated, and disconnected from actual plant water demand. The result: invisible waste, avoidable utility bills, declining landscape performance, and missed sustainability targets.' ); ?>
        <p class="section-body reveal reveal-delay-2"><?php echo esc_html( $body1 ); ?></p>

        <?php $body2 = wcs_field( 'about_body_2', 'WCS was built to close that gap. We work at the intersection of landscape systems, irrigation engineering, and demand-side management — combining field capability with data intelligence to deliver verified savings while protecting the quality and value of your outdoor environment.' ); ?>
        <p class="section-body reveal reveal-delay-2" style="margin-top: 1.25rem;"><?php echo esc_html( $body2 ); ?></p>

        <?php $quote = wcs_field( 'about_quote', '"To give each plant as much water as it needs — but not more."' ); ?>
        <p class="section-body reveal reveal-delay-3" style="margin-top: 1.25rem; font-style: italic; color: var(--color-primary); border-left: 2px solid var(--color-primary); padding-left: 1rem;">
          <?php echo esc_html( $quote ); ?>
        </p>

        <?php
        $pillars = wcs_field( 'about_pillars', [] );
        $default_pillars = [
          [ 'title' => 'Entry Point — Irrigation Efficiency', 'body' => 'Irrigation is where the largest, most recoverable outdoor water losses occur. WCS starts here: auditing performance, identifying waste, and implementing smart, accountable upgrades that generate measurable savings from day one.' ],
          [ 'title' => 'Extended Platform — Demand Management', 'body' => 'Beyond irrigation, WCS extends into alternative water sources, soil and planting optimization, recycled water integration, xeriscaping, and groundwater conservation — a complete demand-side management platform for outdoor water use.' ],
          [ 'title' => 'Full Responsibility — End-to-End Delivery', 'body' => 'We take full ownership from diagnosis through design, implementation, monitoring, and long-term performance reporting. Clients receive verified savings, transparent data, and a partner accountable for results — not just recommendations.' ],
        ];
        $pillars_data = ! empty( $pillars ) ? $pillars : $default_pillars;
        ?>
        <div class="about__pillars reveal reveal-delay-3">
          <?php foreach ( $pillars_data as $i => $pillar ) : ?>
            <div class="pillar">
              <span class="pillar__num"><?php printf( '%02d', $i + 1 ); ?></span>
              <div>
                <div class="pillar__title"><?php echo esc_html( $pillar['title'] ); ?></div>
                <p class="pillar__body"><?php echo esc_html( $pillar['body'] ); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================
     PROJECTS SECTION
     =================================================== -->
<section id="projects" aria-labelledby="projects-heading">
  <div class="container">

    <div style="display: grid; grid-template-columns: 1fr auto; align-items: end; gap: 2rem; margin-bottom: 0.5rem;">
      <div>
        <?php wcs_section_label( wcs_field( 'projects_section_label', 'Case Studies' ) ); ?>
        <h2 id="projects-heading" class="section-heading reveal reveal-delay-1">
          <?php
          $ph = wcs_field( 'projects_heading', "Delivered projects.\nVerified results." );
          $ph_lines = explode( "\n", $ph );
          echo esc_html( $ph_lines[0] );
          if ( isset( $ph_lines[1] ) ) echo '<br>' . esc_html( trim( $ph_lines[1] ) );
          ?>
        </h2>
      </div>
      <a href="#contact" class="btn btn--ghost reveal" style="white-space: nowrap; align-self: flex-end; margin-bottom: 1rem;">Discuss a Project</a>
    </div>

    <div class="projects__grid">
      <?php
      $projects = wcs_field( 'projects_list', [] );
      $default_projects = [
        [
          'featured' => true,
          'tag'   => 'Irrigation Optimization',
          'title' => 'Tarsheed Programme — Irrigation Efficiency at Municipal Scale',
          'desc'  => 'Delivered across multiple municipal landscape assets in Abu Dhabi, the Tarsheed engagement applied systematic irrigation auditing, system upgrades, smart controls, and demand-side recalibration to reduce potable water use across large public realm areas.',
          'image' => [ 'url' => get_template_directory_uri() . '/assets/images/project-tarsheed.svg', 'alt' => 'Tarsheed irrigation programme' ],
          'metrics' => [
            [ 'value' => '35–40%', 'label' => 'Potable water reduction' ],
            [ 'value' => '3M+ m³', 'label' => 'Saved over 4 years' ],
            [ 'value' => '4 years', 'label' => 'Programme duration' ],
          ],
        ],
        [
          'featured' => false,
          'tag'   => 'Water Efficiency Contracting',
          'title' => 'Al Ghadeer — Performance-Based Water Efficiency',
          'desc'  => 'Baseline consumption of approximately 1,800 m³/day reduced to approximately 1,100 m³/day through structured demand analysis, irrigation system retrofit, and performance monitoring.',
          'image' => [ 'url' => get_template_directory_uri() . '/assets/images/project-alghadeer.svg', 'alt' => 'Al Ghadeer community' ],
          'metrics' => [
            [ 'value' => '~40%', 'label' => 'Baseline reduction' ],
            [ 'value' => 'Up to 50%', 'label' => 'Peak monthly savings' ],
            [ 'value' => '~700 m³/d', 'label' => 'Daily water saved' ],
          ],
        ],
        [
          'featured' => false,
          'tag'   => 'Groundwater Conservation',
          'title' => 'Forest Groundwater Conservation — Demand-Side Intervention',
          'desc'  => 'Applied demand-side management methodology to reduce irrigation-driven groundwater extraction in planted forest environments.',
          'image' => [ 'url' => get_template_directory_uri() . '/assets/images/project-forest.svg', 'alt' => 'Forest groundwater conservation' ],
          'metrics' => [
            [ 'value' => '45–50%', 'label' => 'Reduction potential identified' ],
            [ 'value' => 'Groundwater', 'label' => 'Source protected' ],
          ],
        ],
      ];
      $projects_data = ! empty( $projects ) ? $projects : $default_projects;

      foreach ( $projects_data as $idx => $proj ) :
        $is_featured = ! empty( $proj['featured'] );
        $delay = $is_featured ? '' : ' reveal-delay-' . $idx;
        $image = $proj['image'] ?? [];
        $img_url = is_array( $image ) ? ( $image['url'] ?? '' ) : $image;
        $img_alt = is_array( $image ) ? ( $image['alt'] ?? '' ) : '';
      ?>
        <article class="project-card<?php echo $is_featured ? ' project-card--featured' : ''; ?> reveal<?php echo esc_attr( $delay ); ?>">
          <?php if ( $img_url ) : ?>
            <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" class="project-card__image" loading="lazy" decoding="async" />
          <?php endif; ?>
          <div class="project-card__body">
            <span class="project-card__tag"><?php echo esc_html( $proj['tag'] ?? '' ); ?></span>
            <h3 class="project-card__title"><?php echo esc_html( $proj['title'] ?? '' ); ?></h3>
            <p class="project-card__desc"><?php echo esc_html( $proj['desc'] ?? '' ); ?></p>
            <?php if ( ! empty( $proj['metrics'] ) ) : ?>
              <div class="project-card__metrics">
                <?php foreach ( $proj['metrics'] as $metric ) : ?>
                  <div class="metric">
                    <span class="metric__value"><?php echo esc_html( $metric['value'] ?? '' ); ?></span>
                    <span class="metric__label"><?php echo esc_html( $metric['label'] ?? '' ); ?></span>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- Innovation Note -->
    <div style="margin-top: 2rem; padding: 1.5rem 2rem; background: var(--color-surface-2); border: 1px solid var(--color-border); border-radius: var(--radius-lg); display: flex; gap: 1rem; align-items: flex-start;" class="reveal">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="1.5" style="flex-shrink:0; margin-top:2px" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
      <div>
        <div style="font-size: var(--text-sm); font-weight: 600; color: var(--color-text); margin-bottom: 0.25rem; font-family: var(--font-display);">
          <?php echo esc_html( wcs_field( 'projects_innovation_title', 'Innovation Project: Sponge City Prototype' ) ); ?>
        </div>
        <p style="font-size: var(--text-sm); color: var(--color-text-muted); max-width: none;">
          <?php echo esc_html( wcs_field( 'projects_innovation_body', 'An ongoing pilot exploring integrated stormwater capture, greywater recycling, and smart soil management to create closed-loop water systems within urban landscape environments. Details available on request.' ) ); ?>
        </p>
      </div>
    </div>

    <!-- Clients -->
    <?php
    $clients = wcs_field( 'clients', [] );
    $default_clients = [
      [ 'name' => 'Abu Dhabi Municipality' ],
      [ 'name' => 'TAQA' ],
      [ 'name' => 'DEWA Partners' ],
      [ 'name' => 'Al Ghadeer Community' ],
      [ 'name' => 'UAE Forests Authority' ],
      [ 'name' => 'Hospitality Operators' ],
      [ 'name' => 'Commercial Estates' ],
      [ 'name' => 'Embassy Compounds' ],
    ];
    $clients_data = ! empty( $clients ) ? $clients : $default_clients;
    ?>
    <div class="clients reveal">
      <div class="clients__label">Prior Engagements &amp; Client Sectors</div>
      <div class="clients__row">
        <?php foreach ( $clients_data as $client ) : ?>
          <span class="client-badge"><?php echo esc_html( $client['name'] ); ?></span>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>

<!-- ===================================================
     PROCESS SECTION
     =================================================== -->
<section id="process" aria-labelledby="process-heading">
  <div class="container">

    <div class="process__intro">
      <div>
        <?php wcs_section_label( wcs_field( 'process_section_label', 'How We Work' ) ); ?>
        <h2 id="process-heading" class="section-heading reveal reveal-delay-1">
          <?php
          $ph = wcs_field( 'process_heading', "Structured. Accountable.\nPerformance-verified." );
          $ph_lines = explode( "\n", $ph );
          echo esc_html( $ph_lines[0] );
          if ( isset( $ph_lines[1] ) ) echo '<br>' . esc_html( trim( $ph_lines[1] ) );
          ?>
        </h2>
      </div>
      <div>
        <p class="section-body reveal" style="max-width: none;">
          <?php echo esc_html( wcs_field( 'process_intro_body', 'WCS does not deliver advisory reports and disappear. Our engagement model is built around accountability for outcomes: structured intake, rigorous baseline, tailored strategy, phased delivery, and continuous monitoring with transparent reporting against agreed targets.' ) ); ?>
        </p>
      </div>
    </div>

    <div class="process__steps">
      <?php
      $steps = wcs_field( 'process_steps', [] );
      $default_steps = [
        [ 'title' => 'Site Intake', 'desc' => 'We collect your utility bills, site area, planted typologies, current irrigation specifications, and tariff structure. This data forms the factual foundation for all downstream analysis and is handled with discretion.', 'tags' => 'Utility bills,Site area,Plant typologies,Irrigation specs,Tariff structure' ],
        [ 'title' => 'Audit & Baseline', 'desc' => 'A structured field audit assesses actual irrigation performance, system condition, leakage risk, distribution uniformity, scheduling practices, and measurable gaps between current consumption and plant water demand.', 'tags' => 'Irrigation audit,Leak detection,System efficiency,Baseline verification' ],
        [ 'title' => 'Demand Analysis', 'desc' => 'We benchmark actual irrigation demand against plant quantities, planted areas, and municipality or QCC guidance on water requirements by plant type.', 'tags' => 'Plant demand coefficients,QCC benchmarks,Municipality guidance,Waste quantification' ],
        [ 'title' => 'Intervention Strategy', 'desc' => 'We design a tailored intervention package combining the highest-value measures for your asset: smart controllers, soil moisture sensors, pressure regulation, scheduling reform, emitter upgrades, leak resolution, recycled water integration, and xeriscaping options.', 'tags' => 'Smart controls,Sensor systems,Pressure regulation,Recycled water,Xeriscaping,DBOM options' ],
        [ 'title' => 'Implementation', 'desc' => 'Phased delivery with minimal disruption to your operations and landscape. WCS manages or supervises all installation works, ensures quality control, and maintains landscape condition throughout the transition.', 'tags' => 'Phased delivery,Quality control,Minimal disruption,FM coordination' ],
        [ 'title' => 'Monitoring & Verification', 'desc' => 'After implementation, WCS remains engaged. We operate monitoring systems, maintain performance dashboards, produce transparent savings reports, and quantify results against the agreed baseline on a monthly basis.', 'tags' => 'Remote monitoring,Savings dashboard,Monthly reporting,Verified outcomes' ],
      ];
      $steps_data = ! empty( $steps ) ? $steps : $default_steps;

      foreach ( $steps_data as $i => $step ) :
        $delay_classes = [ '', ' reveal-delay-1', ' reveal-delay-2', ' reveal-delay-1', ' reveal-delay-2', ' reveal-delay-3' ];
        $d = $delay_classes[ $i ] ?? '';
        $tags = is_array( $step['tags'] ?? '' ) ? $step['tags'] : array_map( 'trim', explode( ',', $step['tags'] ?? '' ) );
      ?>
        <div class="step reveal<?php echo esc_attr( $d ); ?>">
          <div class="step__num-col">
            <div class="step__circle"><?php printf( '%02d', $i + 1 ); ?></div>
          </div>
          <div class="step__body">
            <div class="step__title"><?php echo esc_html( $step['title'] ); ?></div>
            <p class="step__desc"><?php echo esc_html( $step['desc'] ); ?></p>
            <?php if ( ! empty( array_filter( $tags ) ) ) : ?>
              <div class="step__tags">
                <?php foreach ( $tags as $tag ) : if ( trim( $tag ) ) : ?>
                  <span class="tag"><?php echo esc_html( trim( $tag ) ); ?></span>
                <?php endif; endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Delivery Models -->
    <?php
    $models = wcs_field( 'delivery_models', [] );
    $default_models = [
      [ 'title' => 'DBOM', 'body' => 'Design-Build-Operate-Maintain delivery removes the need for large upfront capital budgets.' ],
      [ 'title' => 'Performance Contracting', 'body' => 'WCS is remunerated from the savings generated. If savings don\'t materialize, neither does our fee.' ],
      [ 'title' => 'Budget-Neutral Upgrades', 'body' => 'System improvements structured so monthly bill savings cover the cost of implementation over time.' ],
    ];
    $models_data = ! empty( $models ) ? $models : $default_models;
    ?>
    <div style="margin-top: var(--space-12); display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1rem;" class="reveal">
      <?php foreach ( $models_data as $model ) : ?>
        <div style="padding: 1.5rem; background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-lg);">
          <div style="font-size: var(--text-xs); font-weight: 700; color: var(--color-primary); letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 0.5rem;"><?php echo esc_html( $model['title'] ); ?></div>
          <div style="font-size: var(--text-sm); color: var(--color-text-muted);"><?php echo esc_html( $model['body'] ); ?></div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ===================================================
     CALCULATOR TEASER SECTION
     =================================================== -->
<section id="calculator" aria-labelledby="calc-heading">
  <div class="container">
    <div class="calc-teaser">
      <div>
        <?php wcs_section_label( wcs_field( 'calc_section_label', 'Savings Estimator' ) ); ?>
        <h2 id="calc-heading" class="section-heading reveal reveal-delay-1">
          <?php echo esc_html( wcs_field( 'calc_heading', "How much are you paying for water you don't need?" ) ); ?>
        </h2>
        <p class="section-body reveal reveal-delay-2">
          <?php echo esc_html( wcs_field( 'calc_body_1', 'Enter your outdoor area, planting mix, and water bills. The WCS calculator estimates your current irrigation cost, what efficient irrigation should cost, and the gap between the two — giving you an indicative view of the savings opportunity on your property.' ) ); ?>
        </p>
        <p class="section-body reveal reveal-delay-3" style="margin-top: 1rem; font-size: var(--text-sm);">
          <?php echo esc_html( wcs_field( 'calc_body_2', 'Applicable to hotels, resorts, sports clubs, commercial compounds, embassies, villas, and mixed-use developments across the UAE. Results are indicative — final savings depend on a site audit, hardware condition, operating schedules, water source, and tariff structure.' ) ); ?>
        </p>
        <div style="margin-top: 2rem;" class="reveal reveal-delay-3">
          <a href="<?php echo esc_url( wcs_field( 'calc_page_url', '/calculator' ) ); ?>" class="btn btn--primary" style="margin-right: 1rem;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 6h8M8 10h8M8 14h4"/></svg>
            <?php echo esc_html( wcs_field( 'calc_btn_text', 'Open Savings Calculator' ) ); ?>
          </a>
        </div>
      </div>

      <!-- Preview Mockup -->
      <div class="calc-teaser__visual reveal reveal-delay-2">
        <div class="calc-preview">
          <div class="calc-preview__row">
            <span class="calc-preview__label">Landscaped area</span>
            <span class="calc-preview__val">12,000 m²</span>
          </div>
          <div class="calc-preview__row">
            <span class="calc-preview__label">Monthly water bill</span>
            <span class="calc-preview__val">AED 42,000</span>
          </div>
          <div class="calc-preview__row">
            <span class="calc-preview__label">Irrigation share</span>
            <span class="calc-preview__val">65%</span>
          </div>
          <div class="calc-preview__divider" aria-hidden="true"></div>
          <div class="calc-preview__row">
            <span class="calc-preview__label">Est. current irrigation cost</span>
            <span class="calc-preview__val">AED 27,300 / mo</span>
          </div>
          <div class="calc-preview__row">
            <span class="calc-preview__label">Est. efficient requirement</span>
            <span class="calc-preview__val">AED 16,400 / mo</span>
          </div>
          <div class="calc-preview__divider" aria-hidden="true"></div>
          <div class="calc-preview__result">
            <span class="calc-preview__result-label">Estimated annual savings</span>
            <span class="calc-preview__result-val">AED 130,800</span>
          </div>
        </div>
        <p class="calc-teaser__note"><?php echo esc_html( wcs_field( 'calc_note', 'Indicative only. Values shown are for illustration. Open the calculator to enter your actual data.' ) ); ?></p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================
     CONTACT / BOOK ASSESSMENT SECTION
     =================================================== -->
<section id="contact" aria-labelledby="contact-heading">
  <div class="container">
    <div class="contact__grid">

      <!-- Left: Info -->
      <div>
        <?php wcs_section_label( wcs_field( 'contact_section_label', 'Get in Touch' ) ); ?>
        <h2 id="contact-heading" class="section-heading reveal reveal-delay-1">
          <?php
          $ch = wcs_field( 'contact_heading', "Reduce your water cost.\nProtect your landscape." );
          $ch_lines = explode( "\n", $ch );
          echo esc_html( $ch_lines[0] );
          if ( isset( $ch_lines[1] ) ) echo '<br>' . esc_html( trim( $ch_lines[1] ) );
          ?>
        </h2>
        <p class="section-body reveal reveal-delay-2">
          <?php echo esc_html( wcs_field( 'contact_body', "If you own or operate a commercial property, hotel, resort, sports facility, embassy, or large residential estate in the UAE — and you pay full water tariff — we can almost certainly help you spend less. Start with a conversation." ) ); ?>
        </p>

        <?php
        $office = wcs_field( 'contact_office', "Smart Station, First Floor\nIncubator Building\nMasdar City, Abu Dhabi\nUnited Arab Emirates" );
        $email  = wcs_field( 'contact_email', 'info@wcs-uae.com' );
        $phone  = wcs_field( 'contact_phone', '+971 50 325 1183' );
        $license = wcs_field( 'contact_license', "Water Conservation Services Limited\nMasdar City Free Zone · Abu Dhabi, UAE\nProvisional Approval — Under Formation" );
        ?>

        <div class="contact__info-label reveal">Office</div>
        <div class="contact__info-val reveal reveal-delay-1"><?php echo nl2br( esc_html( $office ) ); ?></div>

        <div class="contact__info-label reveal">Email</div>
        <div class="contact__info-val reveal reveal-delay-1"><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></div>

        <div class="contact__info-label reveal">Phone</div>
        <div class="contact__info-val reveal reveal-delay-1"><a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></div>

        <div class="contact__info-label reveal">License</div>
        <div class="contact__info-val reveal reveal-delay-1">
          <?php
          $lic_lines = explode( "\n", $license );
          foreach ( $lic_lines as $li => $line ) {
            if ( $li === 2 ) {
              echo '<span style="color: var(--color-text-faint); font-size: var(--text-xs);">' . esc_html( trim( $line ) ) . '</span>';
            } else {
              echo esc_html( trim( $line ) ) . ( $li < count( $lic_lines ) - 1 ? '<br>' : '' );
            }
          }
          ?>
        </div>

        <?php $closing = wcs_field( 'contact_closing_quote', '"Every litre saved is a cost eliminated, a landscape protected, and a sustainability target met. WCS exists to make that outcome reliable, measurable, and repeatable."' ); ?>
        <div style="margin-top: var(--space-10); padding: var(--space-6); background: var(--color-surface); border: 1px solid var(--color-border-accent); border-radius: var(--radius-lg);" class="reveal">
          <p style="font-size: var(--text-sm); color: var(--color-text-muted); font-style: italic; max-width: none;"><?php echo esc_html( $closing ); ?></p>
        </div>
      </div>

      <!-- Right: Form -->
      <div>
        <form class="form" id="contactForm" novalidate>
          <?php wp_nonce_field( 'wcs_contact_form', 'wcs_nonce' ); ?>
          <div class="form__row">
            <div class="field">
              <label for="name">Full Name</label>
              <input type="text" id="name" name="name" placeholder="Hans Kayser" required autocomplete="name" />
            </div>
            <div class="field">
              <label for="company">Company / Organisation</label>
              <input type="text" id="company" name="company" placeholder="Property Group LLC" autocomplete="organization" />
            </div>
          </div>

          <div class="form__row">
            <div class="field">
              <label for="property-type">Property Type</label>
              <select id="property-type" name="property_type" required>
                <option value="" disabled selected>Select type</option>
                <option value="hotel">Hotel</option>
                <option value="resort">Resort</option>
                <option value="sports_club">Sports Club</option>
                <option value="commercial">Commercial Property</option>
                <option value="embassy">Embassy / Diplomatic Compound</option>
                <option value="villa_estate">Villa / Estate</option>
                <option value="mixed_use">Mixed-Use Development</option>
                <option value="government">Government / Municipal</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="field">
              <label for="emirate">Emirate</label>
              <select id="emirate" name="emirate">
                <option value="" disabled selected>Select emirate</option>
                <option value="abu_dhabi">Abu Dhabi</option>
                <option value="dubai">Dubai</option>
                <option value="sharjah">Sharjah</option>
                <option value="ajman">Ajman</option>
                <option value="fujairah">Fujairah</option>
                <option value="ras_al_khaimah">Ras Al Khaimah</option>
                <option value="umm_al_quwain">Umm Al Quwain</option>
              </select>
            </div>
          </div>

          <div class="form__row">
            <div class="field">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" placeholder="you@company.com" required autocomplete="email" />
            </div>
            <div class="field">
              <label for="phone">Phone Number</label>
              <input type="tel" id="phone" name="phone" placeholder="+971 50 000 0000" autocomplete="tel" />
            </div>
          </div>

          <div class="field">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Briefly describe your property, approximate landscaped area, and what you'd like help with. No detail is too small."></textarea>
          </div>

          <div class="form__submit">
            <button type="submit" class="btn btn--primary">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
              Send Message
            </button>
          </div>
        </form>

        <div class="form__success" id="formSuccess">
          <div class="form__success-icon">✓</div>
          <div style="font-family: var(--font-display); font-size: var(--text-lg); color: var(--color-primary); margin-bottom: 0.5rem;">Message received</div>
          <p class="form__success-msg">We'll review your submission and respond within one business day. If your requirement is time-sensitive, call us directly on <?php echo esc_html( $phone ); ?>.</p>
        </div>
      </div>

    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
