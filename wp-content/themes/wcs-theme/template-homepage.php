<?php
/**
 * Template Name: Homepage
 */
get_header();
?>
<main id="main">

<!-- ============================================================
     HERO
     ============================================================ -->
<section id="hero" class="hero" aria-label="Hero">
  <div class="hero__bg" aria-hidden="true"></div>
  <div class="hero__grid-overlay" aria-hidden="true"></div>
  <div class="hero__content">
    <div>
      <div class="hero__eyebrow reveal"><?php echo esc_html( wcs_field('hero_eyebrow','Abu Dhabi, UAE · Est. 2025') ); ?></div>

      <h1 class="hero__heading reveal reveal-delay-1">
        <?php echo esc_html( wcs_field('hero_heading_line1',"UAE's specialist in") ); ?><br>
        <em><?php echo esc_html( wcs_field('hero_heading_line2','measurable water conservation') ); ?></em>
      </h1>

      <p class="hero__sub reveal reveal-delay-2">
        <?php echo esc_html( wcs_field('hero_sub','WCS helps commercial property owners, hotels, resorts, and estates reduce outdoor water waste, lower operating costs, and protect landscape quality — through precision irrigation engineering and performance-based delivery.') ); ?>
      </p>

      <div class="hero__actions reveal reveal-delay-3">
        <a href="<?php echo esc_url( wcs_field('hero_btn1_url','#contact') ); ?>" class="btn btn--primary">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 12h6M9 16h4"/></svg>
          <?php echo esc_html( wcs_field('hero_btn1_text','Book an Assessment') ); ?>
        </a>
        <a href="<?php echo esc_url( wcs_field('hero_btn2_url','/calculator') ); ?>" class="btn btn--outline">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 6h8M8 10h8M8 14h4"/></svg>
          <?php echo esc_html( wcs_field('hero_btn2_text','Estimate My Savings') ); ?>
        </a>
      </div>

      <div class="hero__strip reveal reveal-delay-4">
        <?php
        $strip_defaults = ['Abu Dhabi, UAE','Irrigation Engineering','Demand-Side Management','Performance-Based Delivery','UAE Sustainability Aligned'];
        for ( $i = 1; $i <= 5; $i++ ) :
          $text = wcs_field( 'hero_strip_' . $i, $strip_defaults[$i-1] );
          if ( $text ) :
        ?>
          <div class="hero__strip-item">
            <span class="hero__strip-dot" aria-hidden="true"></span>
            <?php echo esc_html( $text ); ?>
          </div>
        <?php endif; endfor; ?>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     PROOF NUMBERS
     ============================================================ -->
<?php
$proof_defaults = [
  1 => ['15M',     'Cubic Metres Saved',          'Verified across delivered projects'],
  2 => ['156M AED','Value of Savings Generated',  'Direct operating cost reduction'],
  3 => ['6,000',   'Olympic Pools Equivalent',     'Water preserved, not wasted'],
];
?>
<div class="proof" role="region" aria-label="Impact metrics">
  <div class="proof__inner">
    <?php for ( $i = 1; $i <= 3; $i++ ) :
      $d = $proof_defaults[$i];
    ?>
      <div class="proof__item reveal<?php echo $i > 1 ? ' reveal-delay-' . ($i-1) : ''; ?>">
        <div class="proof__number"><?php echo esc_html( wcs_field("proof_{$i}_number", $d[0]) ); ?></div>
        <div class="proof__label"><?php echo esc_html( wcs_field("proof_{$i}_label", $d[1]) ); ?></div>
        <div class="proof__sub"><?php echo esc_html( wcs_field("proof_{$i}_sub", $d[2]) ); ?></div>
      </div>
    <?php endfor; ?>
  </div>
</div>

<!-- ============================================================
     ABOUT
     ============================================================ -->
<section id="about" aria-labelledby="about-heading">
  <div class="container">
    <div class="about__grid">

      <!-- Visual -->
      <div class="about__visual reveal">
        <?php $img = wcs_field('about_image', []); ?>
        <img
          src="<?php echo esc_url( !empty($img['url']) ? $img['url'] : get_template_directory_uri().'/assets/images/about-irrigation.svg' ); ?>"
          alt="<?php echo esc_attr( !empty($img['alt']) ? $img['alt'] : 'Precision drip irrigation system in a UAE landscaped environment' ); ?>"
          class="about__visual-img" loading="lazy" decoding="async"
        />
        <div class="about__visual-overlay" aria-hidden="true"></div>
        <div class="about__visual-stat">
          <div class="about__visual-stat-num"><?php echo esc_html( wcs_field('about_stat_num','35–50%') ); ?></div>
          <div class="about__visual-stat-label"><?php echo esc_html( wcs_field('about_stat_label','Typical potable water reduction per project') ); ?></div>
        </div>
      </div>

      <!-- Content -->
      <div>
        <?php wcs_section_label( wcs_field('about_section_label','About WCS') ); ?>
        <h2 id="about-heading" class="section-heading reveal reveal-delay-1">
          <?php echo esc_html( wcs_field('about_heading',"Water is the UAE's most critical operating cost you're not controlling") ); ?>
        </h2>
        <p class="section-body reveal reveal-delay-2">
          <?php echo esc_html( wcs_field('about_body_1','In the Gulf, landscapes consume a disproportionate share of total water use. Irrigation systems are often outdated, poorly calibrated, and disconnected from actual plant water demand. The result: invisible waste, avoidable utility bills, declining landscape performance, and missed sustainability targets.') ); ?>
        </p>
        <p class="section-body reveal reveal-delay-2" style="margin-top:1.25rem;">
          <?php echo esc_html( wcs_field('about_body_2','WCS was built to close that gap. We work at the intersection of landscape systems, irrigation engineering, and demand-side management — combining field capability with data intelligence to deliver verified savings while protecting the quality and value of your outdoor environment.') ); ?>
        </p>
        <p class="section-body reveal reveal-delay-3" style="margin-top:1.25rem;font-style:italic;color:var(--color-primary);border-left:2px solid var(--color-primary);padding-left:1rem;">
          <?php echo esc_html( wcs_field('about_quote','"To give each plant as much water as it needs — but not more."') ); ?>
        </p>

        <div class="about__pillars reveal reveal-delay-3">
          <?php
          $pillar_defaults = [
            1 => ['Entry Point — Irrigation Efficiency',          'Irrigation is where the largest, most recoverable outdoor water losses occur. WCS starts here: auditing performance, identifying waste, and implementing smart, accountable upgrades that generate measurable savings from day one.'],
            2 => ['Extended Platform — Demand Management',        'Beyond irrigation, WCS extends into alternative water sources, soil and planting optimization, recycled water integration, xeriscaping, and groundwater conservation — a complete demand-side management platform for outdoor water use.'],
            3 => ['Full Responsibility — End-to-End Delivery',    'We take full ownership from diagnosis through design, implementation, monitoring, and long-term performance reporting. Clients receive verified savings, transparent data, and a partner accountable for results — not just recommendations.'],
          ];
          for ( $i = 1; $i <= 3; $i++ ) :
            $d = $pillar_defaults[$i];
          ?>
            <div class="pillar">
              <span class="pillar__num"><?php printf('%02d',$i); ?></span>
              <div>
                <div class="pillar__title"><?php echo esc_html( wcs_field("pillar_{$i}_title",$d[0]) ); ?></div>
                <p class="pillar__body"><?php echo esc_html( wcs_field("pillar_{$i}_body",$d[1]) ); ?></p>
              </div>
            </div>
          <?php endfor; ?>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     PROJECTS
     ============================================================ -->
<section id="projects" aria-labelledby="projects-heading">
  <div class="container">

    <div style="display:grid;grid-template-columns:1fr auto;align-items:end;gap:2rem;margin-bottom:0.5rem;">
      <div>
        <?php wcs_section_label( wcs_field('projects_section_label','Case Studies') ); ?>
        <h2 id="projects-heading" class="section-heading reveal reveal-delay-1">
          <?php echo esc_html( wcs_field('projects_heading_1','Delivered projects.') ); ?><br>
          <?php echo esc_html( wcs_field('projects_heading_2','Verified results.') ); ?>
        </h2>
      </div>
      <a href="#contact" class="btn btn--ghost reveal" style="white-space:nowrap;align-self:flex-end;margin-bottom:1rem;">Discuss a Project</a>
    </div>

    <div class="projects__grid">

      <!-- Project 1 — Featured -->
      <?php $img1 = wcs_field('proj1_image',[]); ?>
      <article class="project-card project-card--featured reveal">
        <img src="<?php echo esc_url(!empty($img1['url']) ? $img1['url'] : get_template_directory_uri().'/assets/images/project-tarsheed.svg'); ?>"
             alt="<?php echo esc_attr(!empty($img1['alt']) ? $img1['alt'] : 'Tarsheed irrigation programme'); ?>"
             class="project-card__image" loading="lazy" decoding="async" />
        <div class="project-card__body">
          <span class="project-card__tag"><?php echo esc_html( wcs_field('proj1_tag','Irrigation Optimization') ); ?></span>
          <h3 class="project-card__title"><?php echo esc_html( wcs_field('proj1_title','Tarsheed Programme — Irrigation Efficiency at Municipal Scale') ); ?></h3>
          <p class="project-card__desc"><?php echo esc_html( wcs_field('proj1_desc','Delivered across multiple municipal landscape assets in Abu Dhabi, the Tarsheed engagement applied systematic irrigation auditing, system upgrades, smart controls, and demand-side recalibration to reduce potable water use across large public realm areas.') ); ?></p>
          <div class="project-card__metrics">
            <?php for($m=1;$m<=3;$m++): $mv=wcs_field("proj1_m{$m}_val"); $ml=wcs_field("proj1_m{$m}_lbl"); if($mv||$ml): ?>
            <div class="metric"><span class="metric__value"><?php echo esc_html($mv); ?></span><span class="metric__label"><?php echo esc_html($ml); ?></span></div>
            <?php endif; endfor; ?>
          </div>
        </div>
      </article>

      <!-- Project 2 -->
      <?php $img2 = wcs_field('proj2_image',[]); ?>
      <article class="project-card reveal reveal-delay-1">
        <img src="<?php echo esc_url(!empty($img2['url']) ? $img2['url'] : get_template_directory_uri().'/assets/images/project-alghadeer.svg'); ?>"
             alt="<?php echo esc_attr(!empty($img2['alt']) ? $img2['alt'] : 'Al Ghadeer community'); ?>"
             class="project-card__image" loading="lazy" decoding="async" />
        <div class="project-card__body">
          <span class="project-card__tag"><?php echo esc_html( wcs_field('proj2_tag','Water Efficiency Contracting') ); ?></span>
          <h3 class="project-card__title"><?php echo esc_html( wcs_field('proj2_title','Al Ghadeer — Performance-Based Water Efficiency') ); ?></h3>
          <p class="project-card__desc"><?php echo esc_html( wcs_field('proj2_desc','Baseline consumption of approximately 1,800 m³/day reduced to approximately 1,100 m³/day through structured demand analysis, irrigation system retrofit, and performance monitoring.') ); ?></p>
          <div class="project-card__metrics">
            <?php for($m=1;$m<=3;$m++): $mv=wcs_field("proj2_m{$m}_val"); $ml=wcs_field("proj2_m{$m}_lbl"); if($mv||$ml): ?>
            <div class="metric"><span class="metric__value"><?php echo esc_html($mv); ?></span><span class="metric__label"><?php echo esc_html($ml); ?></span></div>
            <?php endif; endfor; ?>
          </div>
        </div>
      </article>

      <!-- Project 3 -->
      <?php $img3 = wcs_field('proj3_image',[]); ?>
      <article class="project-card reveal reveal-delay-2">
        <img src="<?php echo esc_url(!empty($img3['url']) ? $img3['url'] : get_template_directory_uri().'/assets/images/project-forest.svg'); ?>"
             alt="<?php echo esc_attr(!empty($img3['alt']) ? $img3['alt'] : 'Forest groundwater conservation'); ?>"
             class="project-card__image" loading="lazy" decoding="async" />
        <div class="project-card__body">
          <span class="project-card__tag"><?php echo esc_html( wcs_field('proj3_tag','Groundwater Conservation') ); ?></span>
          <h3 class="project-card__title"><?php echo esc_html( wcs_field('proj3_title','Forest Groundwater Conservation — Demand-Side Intervention') ); ?></h3>
          <p class="project-card__desc"><?php echo esc_html( wcs_field('proj3_desc','Applied demand-side management methodology to reduce irrigation-driven groundwater extraction in planted forest environments. A 45–50% reduction potential was identified — supporting long-term groundwater security without compromising forest health.') ); ?></p>
          <div class="project-card__metrics">
            <?php for($m=1;$m<=2;$m++): $mv=wcs_field("proj3_m{$m}_val"); $ml=wcs_field("proj3_m{$m}_lbl"); if($mv||$ml): ?>
            <div class="metric"><span class="metric__value"><?php echo esc_html($mv); ?></span><span class="metric__label"><?php echo esc_html($ml); ?></span></div>
            <?php endif; endfor; ?>
          </div>
        </div>
      </article>

    </div>

    <!-- Innovation Note -->
    <div style="margin-top:2rem;padding:1.5rem 2rem;background:var(--color-surface-2);border:1px solid var(--color-border);border-radius:var(--radius-lg);display:flex;gap:1rem;align-items:flex-start;" class="reveal">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="1.5" style="flex-shrink:0;margin-top:2px" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
      <div>
        <div style="font-size:var(--text-sm);font-weight:600;color:var(--color-text);margin-bottom:0.25rem;font-family:var(--font-display);">
          <?php echo esc_html( wcs_field('innovation_title','Innovation Project: Sponge City Prototype') ); ?>
        </div>
        <p style="font-size:var(--text-sm);color:var(--color-text-muted);max-width:none;">
          <?php echo esc_html( wcs_field('innovation_body','An ongoing pilot exploring integrated stormwater capture, greywater recycling, and smart soil management to create closed-loop water systems within urban landscape environments. Details available on request.') ); ?>
        </p>
      </div>
    </div>

    <!-- Clients -->
    <?php
    $client_defaults = ['Abu Dhabi Municipality','TAQA','DEWA Partners','Al Ghadeer Community','UAE Forests Authority','Hospitality Operators','Commercial Estates','Embassy Compounds'];
    ?>
    <div class="clients reveal">
      <div class="clients__label">Prior Engagements &amp; Client Sectors</div>
      <div class="clients__row">
        <?php for($i=1;$i<=8;$i++): $name = wcs_field("client_{$i}",$client_defaults[$i-1]); if($name): ?>
          <span class="client-badge"><?php echo esc_html($name); ?></span>
        <?php endif; endfor; ?>
      </div>
    </div>

  </div>
</section>

<!-- ============================================================
     PROCESS
     ============================================================ -->
<section id="process" aria-labelledby="process-heading">
  <div class="container">
    <div class="process__intro">
      <div>
        <?php wcs_section_label( wcs_field('process_section_label','How We Work') ); ?>
        <h2 id="process-heading" class="section-heading reveal reveal-delay-1">
          <?php echo esc_html( wcs_field('process_heading_1','Structured. Accountable.') ); ?><br>
          <?php echo esc_html( wcs_field('process_heading_2','Performance-verified.') ); ?>
        </h2>
      </div>
      <div>
        <p class="section-body reveal" style="max-width:none;">
          <?php echo esc_html( wcs_field('process_intro_body',"WCS does not deliver advisory reports and disappear. Our engagement model is built around accountability for outcomes: structured intake, rigorous baseline, tailored strategy, phased delivery, and continuous monitoring with transparent reporting against agreed targets.") ); ?>
        </p>
      </div>
    </div>

    <div class="process__steps">
      <?php
      $step_defaults = [
        1 => ['Site Intake',            'We collect your utility bills, site area, planted typologies, current irrigation specifications, and tariff structure. This data forms the factual foundation for all downstream analysis and is handled with discretion.',                                                                                                                    'Utility bills, Site area, Plant typologies, Irrigation specs, Tariff structure'],
        2 => ['Audit & Baseline',       'A structured field audit assesses actual irrigation performance, system condition, leakage risk, distribution uniformity, scheduling practices, and measurable gaps between current consumption and plant water demand. We establish a verified baseline — the reference point for all savings claims.',                                    'Irrigation audit, Leak detection, System efficiency, Baseline verification'],
        3 => ['Demand Analysis',        'We benchmark actual irrigation demand against plant quantities, planted areas, and municipality or QCC guidance on water requirements by plant type. This analysis reveals the gap between what is being applied and what is actually needed — quantifying the waste in financial and volumetric terms.',                                   'Plant demand coefficients, QCC benchmarks, Municipality guidance, Waste quantification'],
        4 => ['Intervention Strategy',  'We design a tailored intervention package combining the highest-value measures for your asset: smart controllers, soil moisture sensors, pressure regulation, scheduling reform, emitter upgrades, leak resolution, recycled water integration, and xeriscaping options.',                                                             'Smart controls, Sensor systems, Pressure regulation, Recycled water, Xeriscaping, DBOM options'],
        5 => ['Implementation',         'Phased delivery with minimal disruption to your operations and landscape. WCS manages or supervises all installation works, ensures quality control, and maintains landscape condition throughout the transition.',                                                                                                                     'Phased delivery, Quality control, Minimal disruption, FM coordination'],
        6 => ['Monitoring & Verification','After implementation, WCS remains engaged. We operate monitoring systems, maintain performance dashboards, produce transparent savings reports, and quantify results against the agreed baseline on a monthly basis.',                                                                                                              'Remote monitoring, Savings dashboard, Monthly reporting, Verified outcomes'],
      ];
      $delays = [1=>'',2=>' reveal-delay-1',3=>' reveal-delay-2',4=>' reveal-delay-1',5=>' reveal-delay-2',6=>' reveal-delay-3'];
      for($i=1;$i<=6;$i++):
        $d = $step_defaults[$i];
        $tags_str = wcs_field("step{$i}_tags",$d[2]);
        $tags = array_filter(array_map('trim', explode(',', $tags_str)));
      ?>
        <div class="step reveal<?php echo esc_attr($delays[$i]); ?>">
          <div class="step__num-col">
            <div class="step__circle"><?php printf('%02d',$i); ?></div>
          </div>
          <div class="step__body">
            <div class="step__title"><?php echo esc_html( wcs_field("step{$i}_title",$d[0]) ); ?></div>
            <p class="step__desc"><?php echo esc_html( wcs_field("step{$i}_desc",$d[1]) ); ?></p>
            <?php if($tags): ?>
              <div class="step__tags">
                <?php foreach($tags as $tag): ?>
                  <span class="tag"><?php echo esc_html($tag); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endfor; ?>
    </div>

    <!-- Delivery Models -->
    <?php
    $dm_defaults = [
      1 => ['DBOM',                    'Design-Build-Operate-Maintain delivery removes the need for large upfront capital budgets.'],
      2 => ['Performance Contracting', "WCS is remunerated from the savings generated. If savings don't materialize, neither does our fee."],
      3 => ['Budget-Neutral Upgrades', 'System improvements structured so monthly bill savings cover the cost of implementation over time.'],
    ];
    ?>
    <div style="margin-top:var(--space-12);display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1rem;" class="reveal">
      <?php for($i=1;$i<=3;$i++): $d=$dm_defaults[$i]; ?>
        <div style="padding:1.5rem;background:var(--color-surface);border:1px solid var(--color-border);border-radius:var(--radius-lg);">
          <div style="font-size:var(--text-xs);font-weight:700;color:var(--color-primary);letter-spacing:0.1em;text-transform:uppercase;margin-bottom:0.5rem;"><?php echo esc_html(wcs_field("dm{$i}_title",$d[0])); ?></div>
          <div style="font-size:var(--text-sm);color:var(--color-text-muted);"><?php echo esc_html(wcs_field("dm{$i}_body",$d[1])); ?></div>
        </div>
      <?php endfor; ?>
    </div>

  </div>
</section>

<!-- ============================================================
     CALCULATOR TEASER
     ============================================================ -->
<section id="calculator" aria-labelledby="calc-heading">
  <div class="container">
    <div class="calc-teaser">
      <div>
        <?php wcs_section_label( wcs_field('calc_section_label','Savings Estimator') ); ?>
        <h2 id="calc-heading" class="section-heading reveal reveal-delay-1">
          <?php echo esc_html( wcs_field('calc_heading',"How much are you paying for water you don't need?") ); ?>
        </h2>
        <p class="section-body reveal reveal-delay-2">
          <?php echo esc_html( wcs_field('calc_body_1','Enter your outdoor area, planting mix, and water bills. The WCS calculator estimates your current irrigation cost, what efficient irrigation should cost, and the gap between the two — giving you an indicative view of the savings opportunity on your property.') ); ?>
        </p>
        <p class="section-body reveal reveal-delay-3" style="margin-top:1rem;font-size:var(--text-sm);">
          <?php echo esc_html( wcs_field('calc_body_2','Applicable to hotels, resorts, sports clubs, commercial compounds, embassies, villas, and mixed-use developments across the UAE. Results are indicative — final savings depend on a site audit, hardware condition, operating schedules, water source, and tariff structure.') ); ?>
        </p>
        <div style="margin-top:2rem;" class="reveal reveal-delay-3">
          <a href="<?php echo esc_url( wcs_field('calc_page_url','/calculator') ); ?>" class="btn btn--primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 6h8M8 10h8M8 14h4"/></svg>
            <?php echo esc_html( wcs_field('calc_btn_text','Open Savings Calculator') ); ?>
          </a>
        </div>
      </div>

      <!-- Preview Mockup -->
      <div class="calc-teaser__visual reveal reveal-delay-2">
        <div class="calc-preview">
          <div class="calc-preview__row"><span class="calc-preview__label">Landscaped area</span><span class="calc-preview__val">12,000 m²</span></div>
          <div class="calc-preview__row"><span class="calc-preview__label">Monthly water bill</span><span class="calc-preview__val">AED 42,000</span></div>
          <div class="calc-preview__row"><span class="calc-preview__label">Irrigation share</span><span class="calc-preview__val">65%</span></div>
          <div class="calc-preview__divider" aria-hidden="true"></div>
          <div class="calc-preview__row"><span class="calc-preview__label">Est. current irrigation cost</span><span class="calc-preview__val">AED 27,300 / mo</span></div>
          <div class="calc-preview__row"><span class="calc-preview__label">Est. efficient requirement</span><span class="calc-preview__val">AED 16,400 / mo</span></div>
          <div class="calc-preview__divider" aria-hidden="true"></div>
          <div class="calc-preview__result"><span class="calc-preview__result-label">Estimated annual savings</span><span class="calc-preview__result-val">AED 130,800</span></div>
        </div>
        <p class="calc-teaser__note"><?php echo esc_html( wcs_field('calc_note','Indicative only. Values shown are for illustration. Open the calculator to enter your actual data.') ); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     CONTACT / BOOK ASSESSMENT
     ============================================================ -->
<section id="contact" aria-labelledby="contact-heading">
  <div class="container">
    <div class="contact__grid">

      <!-- Info -->
      <div>
        <?php wcs_section_label( wcs_field('contact_section_label','Get in Touch') ); ?>
        <h2 id="contact-heading" class="section-heading reveal reveal-delay-1">
          <?php echo esc_html( wcs_field('contact_heading_1','Reduce your water cost.') ); ?><br>
          <?php echo esc_html( wcs_field('contact_heading_2','Protect your landscape.') ); ?>
        </h2>
        <p class="section-body reveal reveal-delay-2">
          <?php echo esc_html( wcs_field('contact_body',"If you own or operate a commercial property, hotel, resort, sports facility, embassy, or large residential estate in the UAE — and you pay full water tariff — we can almost certainly help you spend less. Start with a conversation.") ); ?>
        </p>

        <div class="contact__info-label reveal">Office</div>
        <div class="contact__info-val reveal reveal-delay-1">
          <?php echo nl2br( esc_html( wcs_field('contact_office',"Smart Station, First Floor\nIncubator Building\nMasdar City, Abu Dhabi\nUnited Arab Emirates") ) ); ?>
        </div>

        <div class="contact__info-label reveal">Email</div>
        <div class="contact__info-val reveal reveal-delay-1">
          <?php $email = wcs_field('contact_email','info@wcs-uae.com'); ?>
          <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
        </div>

        <div class="contact__info-label reveal">Phone</div>
        <div class="contact__info-val reveal reveal-delay-1">
          <?php $phone = wcs_field('contact_phone','+971 50 325 1183'); ?>
          <a href="tel:<?php echo esc_attr(preg_replace('/\s+/','',$phone)); ?>"><?php echo esc_html($phone); ?></a>
        </div>

        <div class="contact__info-label reveal">License</div>
        <div class="contact__info-val reveal reveal-delay-1">
          <?php
          $lic = wcs_field('contact_license',"Water Conservation Services Limited\nMasdar City Free Zone · Abu Dhabi, UAE\nProvisional Approval — Under Formation");
          $lines = explode("\n", $lic);
          foreach($lines as $li => $line):
            $line = trim($line);
            if($li === 2): ?><span style="color:var(--color-text-faint);font-size:var(--text-xs);"><?php echo esc_html($line); ?></span>
            <?php else: echo esc_html($line); if($li < count($lines)-1) echo '<br>'; endif;
          endforeach; ?>
        </div>

        <div style="margin-top:var(--space-10);padding:var(--space-6);background:var(--color-surface);border:1px solid var(--color-border-accent);border-radius:var(--radius-lg);" class="reveal">
          <p style="font-size:var(--text-sm);color:var(--color-text-muted);font-style:italic;max-width:none;">
            <?php echo esc_html( wcs_field('contact_closing_quote','"Every litre saved is a cost eliminated, a landscape protected, and a sustainability target met. WCS exists to make that outcome reliable, measurable, and repeatable."') ); ?>
          </p>
        </div>
      </div>

      <!-- Form -->
      <div>
        <form class="form" id="contactForm" novalidate>
          <?php wp_nonce_field('wcs_contact_form','wcs_nonce'); ?>
          <div class="form__row">
            <div class="field"><label for="name">Full Name</label><input type="text" id="name" name="name" placeholder="Hans Kayser" required autocomplete="name" /></div>
            <div class="field"><label for="company">Company / Organisation</label><input type="text" id="company" name="company" placeholder="Property Group LLC" autocomplete="organization" /></div>
          </div>
          <div class="form__row">
            <div class="field">
              <label for="property-type">Property Type</label>
              <select id="property-type" name="property_type" required>
                <option value="" disabled selected>Select type</option>
                <option value="hotel">Hotel</option><option value="resort">Resort</option><option value="sports_club">Sports Club</option><option value="commercial">Commercial Property</option><option value="embassy">Embassy / Diplomatic Compound</option><option value="villa_estate">Villa / Estate</option><option value="mixed_use">Mixed-Use Development</option><option value="government">Government / Municipal</option><option value="other">Other</option>
              </select>
            </div>
            <div class="field">
              <label for="emirate">Emirate</label>
              <select id="emirate" name="emirate">
                <option value="" disabled selected>Select emirate</option>
                <option value="abu_dhabi">Abu Dhabi</option><option value="dubai">Dubai</option><option value="sharjah">Sharjah</option><option value="ajman">Ajman</option><option value="fujairah">Fujairah</option><option value="ras_al_khaimah">Ras Al Khaimah</option><option value="umm_al_quwain">Umm Al Quwain</option>
              </select>
            </div>
          </div>
          <div class="form__row">
            <div class="field"><label for="email">Email Address</label><input type="email" id="email" name="email" placeholder="you@company.com" required autocomplete="email" /></div>
            <div class="field"><label for="phone">Phone Number</label><input type="tel" id="phone" name="phone" placeholder="+971 50 000 0000" autocomplete="tel" /></div>
          </div>
          <div class="field"><label for="message">Message</label><textarea id="message" name="message" placeholder="Briefly describe your property, approximate landscaped area, and what you'd like help with."></textarea></div>
          <div class="form__submit">
            <button type="submit" class="btn btn--primary">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
              Send Message
            </button>
          </div>
        </form>
        <div class="form__success" id="formSuccess">
          <div class="form__success-icon">✓</div>
          <div style="font-family:var(--font-display);font-size:var(--text-lg);color:var(--color-primary);margin-bottom:0.5rem;">Message received</div>
          <p class="form__success-msg">We'll review your submission and respond within one business day. If your requirement is time-sensitive, call us directly on <?php echo esc_html( wcs_field('contact_phone','+971 50 325 1183') ); ?>.</p>
        </div>
      </div>

    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
