<?php
/**
 * Template Name: Calculator
 */
get_header();
$c_palms       = (float) wcs_field('coeff_palms', 2.5);
$c_trees       = (float) wcs_field('coeff_trees', 1.8);
$c_shrubs      = (float) wcs_field('coeff_shrubs', 0.018);
$c_groundcover = (float) wcs_field('coeff_groundcover', 0.012);
$c_turf        = (float) wcs_field('coeff_turf', 0.045);
?>
<div class="calc-page">
  <div class="calc-header">
    <div class="container">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="calc-back">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Back to WCS
      </a>
      <span class="section-label"><?php echo esc_html( wcs_field('calc_section_label','Savings Estimator') ); ?></span>
      <h1 class="section-heading" style="margin-bottom:.75rem;"><?php echo esc_html( wcs_field('calc_page_heading','Water Savings Calculator') ); ?></h1>
      <p style="font-size:1rem;color:var(--text-2);max-width:60ch;"><?php echo esc_html( wcs_field('calc_page_sub','Estimate your irrigation savings potential based on your outdoor area, planting mix, and utility bills. Results are indicative — a site audit will provide verified figures.') ); ?></p>
    </div>
  </div>

  <main id="main" class="calc-main">
    <div class="container">
      <div class="calc-layout">

        <!-- ── FORM ── -->
        <div class="calc-card">

          <!-- Site & Area -->
          <div class="calc-section">
            <div class="calc-section-title">Site &amp; Area</div>
            <div class="calc-fields">
              <div class="calc-field calc-field--full">
                <label for="calc-type">Property Type</label>
                <div class="calc-input-wrap">
                  <select id="calc-type">
                    <option value="" disabled selected>Select type</option>
                    <option value="hotel">Hotel</option>
                    <option value="resort">Resort</option>
                    <option value="sports">Sports Club</option>
                    <option value="commercial">Commercial Property</option>
                    <option value="embassy">Embassy / Compound</option>
                    <option value="villa">Villa / Estate</option>
                    <option value="mixed">Mixed-Use Development</option>
                    <option value="government">Government / Municipal</option>
                  </select>
                </div>
              </div>
              <div class="calc-field calc-field--full">
                <label for="calc-area">Total Landscaped Area</label>
                <div class="calc-input-wrap">
                  <input type="number" id="calc-area" placeholder="e.g. 8000" min="0" step="100" />
                  <span class="unit">m²</span>
                </div>
                <div class="hint">Total outdoor irrigated area — gardens, lawns, and planted beds</div>
              </div>
            </div>
          </div>

          <!-- Planting Mix -->
          <div class="calc-section">
            <div class="calc-section-title">Planting Mix</div>
            <p style="font-size:.75rem;color:var(--text-3);margin-bottom:1rem;line-height:1.5;">Enter quantities for each plant type. Leave blank if not present. Areas should sum approximately to your total landscaped area.</p>
            <div class="calc-fields">
              <div class="calc-field">
                <label for="calc-palms">Palm Trees</label>
                <div class="calc-input-wrap"><input type="number" id="calc-palms" placeholder="0" min="0" step="1" /><span class="unit">no.</span></div>
              </div>
              <div class="calc-field">
                <label for="calc-trees">Trees</label>
                <div class="calc-input-wrap"><input type="number" id="calc-trees" placeholder="0" min="0" step="1" /><span class="unit">no.</span></div>
              </div>
              <div class="calc-field">
                <label for="calc-shrubs">Shrubs</label>
                <div class="calc-input-wrap"><input type="number" id="calc-shrubs" placeholder="0" min="0" step="100" /><span class="unit">m²</span></div>
              </div>
              <div class="calc-field">
                <label for="calc-groundcover">Ground Cover</label>
                <div class="calc-input-wrap"><input type="number" id="calc-groundcover" placeholder="0" min="0" step="100" /><span class="unit">m²</span></div>
              </div>
              <div class="calc-field calc-field--full">
                <label for="calc-turf">Grass / Turf</label>
                <div class="calc-input-wrap"><input type="number" id="calc-turf" placeholder="0" min="0" step="100" /><span class="unit">m²</span></div>
              </div>
            </div>
          </div>

          <!-- Water Billing -->
          <div class="calc-section">
            <div class="calc-section-title">Water Billing</div>
            <div class="calc-fields">
              <div class="calc-field calc-field--full">
                <label for="calc-utility">Utility Provider</label>
                <div class="calc-input-wrap">
                  <select id="calc-utility">
                    <option value="" disabled selected>Select provider</option>
                    <option value="taqa">TAQA (Abu Dhabi)</option>
                    <option value="dewa">DEWA (Dubai)</option>
                    <option value="sewa">SEWA (Sharjah)</option>
                    <option value="other">Other / Unknown</option>
                  </select>
                </div>
              </div>
              <div class="calc-field">
                <label for="calc-bill">Monthly Water Bill</label>
                <div class="calc-input-wrap"><input type="number" id="calc-bill" placeholder="e.g. 35000" min="0" step="500" /><span class="unit">AED</span></div>
              </div>
              <div class="calc-field">
                <label for="calc-irrig-pct">Irrigation Share</label>
                <div class="calc-input-wrap"><input type="number" id="calc-irrig-pct" placeholder="e.g. 60" min="0" max="100" step="5" /><span class="unit">%</span></div>
                <div class="hint">% of total bill from outdoor irrigation</div>
              </div>
              <div class="calc-field calc-field--full">
                <label for="calc-source">Irrigation Source</label>
                <div class="calc-input-wrap">
                  <select id="calc-source">
                    <option value="potable" selected>Potable (treated municipal)</option>
                    <option value="recycled">Recycled / TSE</option>
                    <option value="mixed">Mixed</option>
                    <option value="unknown">Unknown</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="tariff-note">
              <?php echo esc_html( wcs_field('calc_tariff_note','Tariff reference: TAQA Abu Dhabi ≈ AED 2.95–6.65/m³ · DEWA Dubai ≈ AED 3.12–8.59/m³ · Commercial tariffs vary. The calculator uses your bill data — not assumed tariff rates.') ); ?>
            </div>
          </div>

          <!-- Coefficients -->
          <div class="calc-section">
            <div class="calc-section-title">Benchmark Coefficients</div>
            <p style="font-size:.75rem;color:var(--text-3);margin-bottom:.75rem;line-height:1.5;"><?php echo esc_html( wcs_field('calc_coeff_note','Planning-level irrigation demand values based on typical UAE climate conditions. Editable for scenario modelling.') ); ?></p>
            <button class="coeff-toggle" id="toggleCoeff" aria-expanded="false">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="toggleIcon"><path d="M6 9l6 6 6-6"/></svg>
              View / Edit Coefficients
            </button>
            <div class="coeff-panel" id="coeffPanel">
              <table class="coeff-table">
                <thead><tr><th>Plant Type</th><th>Unit</th><th style="text-align:right;">Value</th></tr></thead>
                <tbody>
                  <tr><td>Palms</td><td>m³/palm/month</td><td style="text-align:right;"><input type="number" class="coeff-input" id="c-palms" value="<?php echo esc_attr($c_palms); ?>" step="0.1" min="0" /></td></tr>
                  <tr><td>Trees</td><td>m³/tree/month</td><td style="text-align:right;"><input type="number" class="coeff-input" id="c-trees" value="<?php echo esc_attr($c_trees); ?>" step="0.1" min="0" /></td></tr>
                  <tr><td>Shrubs</td><td>m³/m²/month</td><td style="text-align:right;"><input type="number" class="coeff-input" id="c-shrubs" value="<?php echo esc_attr($c_shrubs); ?>" step="0.001" min="0" /></td></tr>
                  <tr><td>Ground Cover</td><td>m³/m²/month</td><td style="text-align:right;"><input type="number" class="coeff-input" id="c-groundcover" value="<?php echo esc_attr($c_groundcover); ?>" step="0.001" min="0" /></td></tr>
                  <tr><td>Grass / Turf</td><td>m³/m²/month</td><td style="text-align:right;"><input type="number" class="coeff-input" id="c-turf" value="<?php echo esc_attr($c_turf); ?>" step="0.001" min="0" /></td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Calculate btn -->
          <div class="calc-section">
            <button class="btn btn--primary" id="calcBtn" style="width:100%;justify-content:center;">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Calculate Savings Estimate
            </button>
            <p style="font-size:.72rem;color:var(--text-3);text-align:center;margin-top:.75rem;">Results update automatically as you enter data</p>
          </div>
        </div>

        <!-- ── RESULTS ── -->
        <div>
          <div class="results-card">
            <div class="results-header"><div class="results-title">Estimated Savings</div></div>

            <!-- Empty state -->
            <div class="results-empty" id="resultsEmpty">
              <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--text-3)" stroke-width="1.5" style="margin:0 auto 1rem;" aria-hidden="true"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 6h8M8 10h8M8 14h4"/></svg>
              Enter your site data to see an indicative savings estimate.
            </div>

            <!-- Results -->
            <div class="results-body" id="resultsBody" style="display:none;">
              <div class="result-row"><span class="result-lbl">Est. current irrigation cost</span><span class="result-val" id="r-current">—</span></div>
              <div class="result-row"><span class="result-lbl">Est. efficient irrigation demand</span><span class="result-val" id="r-demand">—</span></div>
              <div class="results-divider"></div>
              <div class="result-row"><span class="result-lbl">Est. efficient irrigation cost</span><span class="result-val" id="r-efficient">—</span></div>
              <div class="result-row"><span class="result-lbl">Est. excess / wastage</span><span class="result-val" id="r-excess">—</span></div>
              <div class="result-row"><span class="result-lbl">Estimated reduction</span><span class="result-val" id="r-pct">—</span></div>
              <div class="savings-box">
                <div class="savings-box__label">Est. Monthly Savings</div>
                <div class="savings-box__amount" id="r-monthly">—</div>
                <div class="savings-box__period">per month / based on entered data</div>
              </div>
              <div class="savings-box" style="background:rgba(0,174,203,.04);">
                <div class="savings-box__label">Est. Annual Savings</div>
                <div class="savings-box__amount" id="r-annual">—</div>
                <div class="savings-box__period">per year / indicative</div>
              </div>
            </div>

            <div class="results-disclaimer"><?php echo esc_html( wcs_field('calc_disclaimer','Indicative only. Final savings depend on site audit findings, irrigation hardware condition, operating schedules, water source, soil conditions, and applicable tariff structure. This calculator is a planning tool, not an engineering guarantee.') ); ?></div>

            <div class="results-cta" id="resultsCTA" style="display:none;">
              <a href="<?php echo esc_url( home_url('/#contact') ); ?>" class="btn btn--primary" style="width:100%;justify-content:center;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                Discuss Your Project
              </a>
              <p style="font-size:.72rem;color:var(--text-3);text-align:center;">WCS will verify these figures with a full on-site audit.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
</div>

<script>
(function(){
  // DOM refs
  var inputs = {
    palms: document.getElementById('calc-palms'),
    trees: document.getElementById('calc-trees'),
    shrubs: document.getElementById('calc-shrubs'),
    groundcover: document.getElementById('calc-groundcover'),
    turf: document.getElementById('calc-turf'),
    bill: document.getElementById('calc-bill'),
    irrigPct: document.getElementById('calc-irrig-pct'),
  };
  var coeffs = {
    palms: document.getElementById('c-palms'),
    trees: document.getElementById('c-trees'),
    shrubs: document.getElementById('c-shrubs'),
    groundcover: document.getElementById('c-groundcover'),
    turf: document.getElementById('c-turf'),
  };
  var utilityEl = document.getElementById('calc-utility');
  var empty  = document.getElementById('resultsEmpty');
  var body   = document.getElementById('resultsBody');
  var cta    = document.getElementById('resultsCTA');

  function n(el){ return parseFloat(el && el.value) || 0; }

  function fmt(v, d) {
    d = d === undefined ? 0 : d;
    return v.toLocaleString('en-AE', { minimumFractionDigits: d, maximumFractionDigits: d });
  }
  function fmtAED(v) {
    if (v >= 1000000) return 'AED ' + fmt(v/1000000, 2) + 'M';
    if (v >= 1000)    return 'AED ' + fmt(v/1000, 1) + 'K';
    return 'AED ' + fmt(v);
  }
  function set(id, val){ var el=document.getElementById(id); if(el) el.textContent=val; }

  function calculate() {
    var bill = n(inputs.bill);
    var irrigPct = n(inputs.irrigPct) / 100;
    if (!bill || !irrigPct) { showEmpty(); return; }

    var irrigCost = bill * irrigPct;

    // Tariff per m³
    var tariff = 4.5;
    if (utilityEl) {
      if (utilityEl.value === 'taqa') tariff = 3.8;
      else if (utilityEl.value === 'dewa') tariff = 5.2;
      else if (utilityEl.value === 'sewa') tariff = 3.5;
    }

    var currentVol = irrigCost / tariff;

    // Efficient demand from plant data
    var palms  = n(inputs.palms);
    var trees  = n(inputs.trees);
    var shrubs = n(inputs.shrubs);
    var gc     = n(inputs.groundcover);
    var turf   = n(inputs.turf);
    var hasPlants = (palms + trees + shrubs + gc + turf) > 0;

    var cp = parseFloat(coeffs.palms.value)       || <?php echo (float)$c_palms; ?>;
    var ct = parseFloat(coeffs.trees.value)       || <?php echo (float)$c_trees; ?>;
    var cs = parseFloat(coeffs.shrubs.value)      || <?php echo (float)$c_shrubs; ?>;
    var cg = parseFloat(coeffs.groundcover.value) || <?php echo (float)$c_groundcover; ?>;
    var cf = parseFloat(coeffs.turf.value)        || <?php echo (float)$c_turf; ?>;

    var effVol, pct;
    if (hasPlants) {
      effVol = (palms*cp) + (trees*ct) + (shrubs*cs) + (gc*cg) + (turf*cf);
      if (effVol >= currentVol) effVol = currentVol * 0.70;
      pct = Math.max(0, 1 - effVol / currentVol);
    } else {
      pct = 0.35;
      effVol = currentVol * (1 - pct);
    }

    var effCost  = effVol * tariff;
    var monthly  = irrigCost - effCost;
    var annual   = monthly * 12;
    var excess   = currentVol - effVol;

    set('r-current',   'AED ' + fmt(irrigCost) + ' / mo');
    set('r-demand',    hasPlants ? fmt(effVol, 0) + ' m³ / mo' : '— (enter plant data)');
    set('r-efficient', 'AED ' + fmt(effCost) + ' / mo');
    set('r-excess',    hasPlants ? fmt(excess, 0) + ' m³ / mo' : 'Enter plant data above');
    set('r-pct',       '~' + fmt(pct * 100, 0) + '%');
    set('r-monthly',   fmtAED(monthly) + ' / mo');
    set('r-annual',    fmtAED(annual) + ' / yr');

    empty.style.display = 'none';
    body.style.display  = 'flex';
    cta.style.display   = 'flex';
  }

  function showEmpty() {
    empty.style.display = 'block';
    body.style.display  = 'none';
    cta.style.display   = 'none';
  }

  // Listeners
  Object.values(inputs).forEach(function(el){ if(el){ el.addEventListener('input', calculate); el.addEventListener('change', calculate); } });
  Object.values(coeffs).forEach(function(el){ if(el) el.addEventListener('input', calculate); });
  if(utilityEl){ utilityEl.addEventListener('change', calculate); }
  document.getElementById('calcBtn').addEventListener('click', calculate);

  // Coefficients toggle
  var toggleBtn = document.getElementById('toggleCoeff');
  var panel     = document.getElementById('coeffPanel');
  var icon      = document.getElementById('toggleIcon');
  if (toggleBtn && panel) {
    toggleBtn.addEventListener('click', function(){
      var open = panel.classList.toggle('open');
      toggleBtn.setAttribute('aria-expanded', open);
      if(icon) icon.style.transform = open ? 'rotate(180deg)' : '';
    });
  }
})();
</script>

<?php get_footer(); ?>
