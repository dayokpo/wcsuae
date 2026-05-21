<?php
/**
 * Template Name: Calculator
 */
get_header();
$section_label = wcs_field('calc_page_section_label','Savings Estimator');
$page_heading  = wcs_field('calc_page_heading','Water Savings Calculator');
$subheading    = wcs_field('calc_page_subheading','Estimate your irrigation savings potential based on your outdoor area, planting mix, and utility bills. Results are indicative — a site audit will provide verified figures.');
$disclaimer    = wcs_field('calc_page_disclaimer','Indicative only. Final savings depend on site audit findings, irrigation hardware condition, operating schedules, water source, soil conditions, and applicable tariff structure. This calculator is a planning tool, not an engineering guarantee.');
$tariff_info   = wcs_field('calc_tariff_info','Tariff reference: TAQA Abu Dhabi residential ≈ AED 2.95–6.65/m³ · DEWA Dubai ≈ AED 3.12–8.59/m³ · Commercial tariffs vary. The calculator uses your bill data — not assumed tariff rates.');
$coeff_note    = wcs_field('calc_coefficients_note','The following irrigation demand coefficients are used to estimate efficient water requirements by plant type. These are planning-level values based on typical UAE climate conditions.');
$c_palms       = (float) wcs_field('coeff_palms', 2.5);
$c_trees       = (float) wcs_field('coeff_trees', 1.8);
$c_shrubs      = (float) wcs_field('coeff_shrubs', 0.018);
$c_groundcover = (float) wcs_field('coeff_groundcover', 0.012);
$c_turf        = (float) wcs_field('coeff_turf', 0.045);
?>
<style>
.calc-page{min-height:100svh;background:var(--color-bg);padding-top:72px}
.calc-header{background:var(--color-surface);border-bottom:1px solid var(--color-border);padding-block:var(--space-10)}
.calc-back{display:inline-flex;align-items:center;gap:var(--space-2);font-size:var(--text-sm);color:var(--color-text-muted);margin-bottom:var(--space-6);transition:color var(--transition)}
.calc-back:hover{color:var(--color-primary)}
.calc-main{padding-block:var(--space-12)}
.calc-layout{display:grid;grid-template-columns:1fr 420px;gap:var(--space-10);align-items:start}
.calc-form-card{background:var(--color-surface);border:1px solid var(--color-border);border-radius:var(--radius-xl);overflow:hidden}
.calc-form-section{padding:var(--space-8);border-bottom:1px solid var(--color-divider)}
.calc-form-section:last-child{border-bottom:none}
.calc-section-title{font-family:var(--font-display);font-size:var(--text-sm);font-weight:700;color:var(--color-primary);letter-spacing:0.1em;text-transform:uppercase;margin-bottom:var(--space-5);display:flex;align-items:center;gap:var(--space-3)}
.calc-section-title::before{content:'';width:16px;height:1px;background:var(--color-primary)}
.calc-fields{display:grid;grid-template-columns:repeat(2,1fr);gap:var(--space-4)}
.calc-field{display:flex;flex-direction:column;gap:var(--space-2)}
.calc-field--full{grid-column:span 2}
.calc-field label{font-size:var(--text-xs);font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--color-text-muted)}
.calc-field .hint{font-size:11px;color:var(--color-text-faint);margin-top:2px}
.input-wrap{position:relative;display:flex;align-items:center}
.input-wrap input,.input-wrap select{width:100%;background:var(--color-surface-2);border:1px solid var(--color-border);border-radius:var(--radius-md);padding:var(--space-3) var(--space-4);font-size:var(--text-sm);color:var(--color-text);transition:border-color var(--transition),box-shadow var(--transition);-webkit-appearance:none}
.input-wrap input:focus,.input-wrap select:focus{outline:none;border-color:var(--color-primary);box-shadow:0 0 0 3px rgba(0,174,203,.1)}
.input-wrap .unit{position:absolute;right:12px;font-size:var(--text-xs);color:var(--color-text-faint);pointer-events:none;white-space:nowrap}
.input-wrap select{background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%238892A4' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;padding-right:36px}
.assumptions-toggle{display:flex;align-items:center;gap:var(--space-2);font-size:var(--text-xs);color:var(--color-text-faint);cursor:pointer;margin-top:var(--space-3);background:none;border:none;padding:0;font-family:var(--font-body)}
.assumptions-toggle:hover{color:var(--color-primary)}
.assumptions-panel{display:none;margin-top:var(--space-4);background:var(--color-surface-2);border:1px solid var(--color-border);border-radius:var(--radius-md);padding:var(--space-5)}
.assumptions-panel.open{display:block}
.assumptions-table{width:100%;border-collapse:collapse;font-size:var(--text-xs)}
.assumptions-table th{text-align:left;color:var(--color-text-faint);font-weight:600;letter-spacing:0.06em;padding:var(--space-2) var(--space-3);border-bottom:1px solid var(--color-divider)}
.assumptions-table td{padding:var(--space-2) var(--space-3);color:var(--color-text-muted);border-bottom:1px solid var(--color-divider)}
.assumptions-table tr:last-child td{border-bottom:none}
.editable{background:var(--color-surface-3);border:1px solid var(--color-border);border-radius:var(--radius-sm);padding:2px var(--space-2);color:var(--color-primary);font-family:var(--font-body);font-size:var(--text-xs);width:80px;text-align:right}
.editable:focus{outline:none;border-color:var(--color-primary)}
.results-card{position:sticky;top:90px;background:var(--color-surface);border:1px solid var(--color-border-accent);border-radius:var(--radius-xl);overflow:hidden}
.results-header{padding:var(--space-6) var(--space-8);background:rgba(0,174,203,.05);border-bottom:1px solid var(--color-border)}
.results-title{font-family:var(--font-display);font-size:var(--text-sm);font-weight:700;color:var(--color-primary);letter-spacing:0.1em;text-transform:uppercase}
.results-body{padding:var(--space-6) var(--space-8);display:flex;flex-direction:column;gap:var(--space-5)}
.result-row{display:flex;justify-content:space-between;align-items:baseline;gap:var(--space-4)}
.result-label{font-size:var(--text-xs);color:var(--color-text-muted);flex:1}
.result-value{font-family:var(--font-display);font-size:var(--text-base);font-weight:700;color:var(--color-text);text-align:right;white-space:nowrap}
.results-divider{height:1px;background:var(--color-divider);margin:var(--space-2) 0}
.results-savings-box{background:rgba(0,174,203,.06);border:1px solid var(--color-border-accent);border-radius:var(--radius-lg);padding:var(--space-6);margin:var(--space-2) 0}
.savings-label{font-size:var(--text-xs);color:var(--color-text-muted);letter-spacing:0.06em;text-transform:uppercase;margin-bottom:var(--space-2)}
.savings-amount{font-family:var(--font-display);font-size:clamp(1.8rem,3vw,2.5rem);font-weight:800;color:var(--color-primary);line-height:1;margin-bottom:var(--space-1)}
.savings-period{font-size:var(--text-xs);color:var(--color-text-faint)}
.results-empty{padding:var(--space-10) var(--space-8);text-align:center;color:var(--color-text-faint);font-size:var(--text-sm)}
.results-empty svg{margin:0 auto var(--space-4)}
.results-disclaimer{padding:var(--space-5) var(--space-8);border-top:1px solid var(--color-divider);font-size:11px;color:var(--color-text-faint);line-height:1.5;font-style:italic}
.calc-submit-area{padding:var(--space-6) var(--space-8);border-top:1px solid var(--color-divider);display:flex;flex-direction:column;gap:var(--space-3)}
.tariff-info{font-size:var(--text-xs);color:var(--color-text-faint);padding:var(--space-3) var(--space-4);background:var(--color-surface-2);border-radius:var(--radius-md);margin-top:var(--space-2)}
@media(max-width:900px){.calc-layout{grid-template-columns:1fr}.results-card{position:static}.calc-fields{grid-template-columns:1fr}.calc-field--full{grid-column:span 1}}
</style>

<div class="calc-page">
  <div class="calc-header">
    <div class="container container--default">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="calc-back">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Back to WCS
      </a>
      <div class="section-label"><?php echo esc_html($section_label); ?></div>
      <h1 style="font-size:var(--text-2xl);font-weight:700;color:var(--color-text);letter-spacing:-0.02em;line-height:1.1;margin-bottom:0.75rem;"><?php echo esc_html($page_heading); ?></h1>
      <p style="font-size:var(--text-base);color:var(--color-text-muted);max-width:58ch;"><?php echo esc_html($subheading); ?></p>
    </div>
  </div>

  <main id="main" class="calc-main">
    <div class="container container--default">
      <div class="calc-layout">

        <!-- Form -->
        <div class="calc-form-card">
          <div class="calc-form-section">
            <div class="calc-section-title">Site &amp; Area</div>
            <div class="calc-fields">
              <div class="calc-field calc-field--full">
                <label for="calc-property-type">Property Type</label>
                <div class="input-wrap">
                  <select id="calc-property-type">
                    <option value="" disabled selected>Select type</option>
                    <option value="hotel">Hotel</option><option value="resort">Resort</option><option value="sports_club">Sports Club</option><option value="commercial">Commercial Property</option><option value="embassy">Embassy / Compound</option><option value="villa">Villa / Estate</option><option value="mixed_use">Mixed-Use Development</option><option value="government">Government / Municipal</option>
                  </select>
                </div>
              </div>
              <div class="calc-field calc-field--full">
                <label for="calc-total-area">Total Landscaped Area</label>
                <div class="input-wrap"><input type="number" id="calc-total-area" placeholder="e.g. 8000" min="0" step="100" /><span class="unit">m²</span></div>
                <div class="hint">Total outdoor irrigated area including gardens, lawns, and planted areas</div>
              </div>
            </div>
          </div>

          <div class="calc-form-section">
            <div class="calc-section-title">Planting Mix</div>
            <p style="font-size:var(--text-xs);color:var(--color-text-faint);margin-bottom:var(--space-5);max-width:none;">Enter quantities/areas for each plant type present on your site. Leave blank if not applicable.</p>
            <div class="calc-fields">
              <div class="calc-field"><label for="calc-palms">Palm Trees</label><div class="input-wrap"><input type="number" id="calc-palms" placeholder="0" min="0" step="1" /><span class="unit">no.</span></div></div>
              <div class="calc-field"><label for="calc-trees">Trees</label><div class="input-wrap"><input type="number" id="calc-trees" placeholder="0" min="0" step="1" /><span class="unit">no.</span></div></div>
              <div class="calc-field"><label for="calc-shrubs">Shrubs</label><div class="input-wrap"><input type="number" id="calc-shrubs" placeholder="0" min="0" step="100" /><span class="unit">m²</span></div></div>
              <div class="calc-field"><label for="calc-groundcover">Ground Cover</label><div class="input-wrap"><input type="number" id="calc-groundcover" placeholder="0" min="0" step="100" /><span class="unit">m²</span></div></div>
              <div class="calc-field calc-field--full"><label for="calc-turf">Grass / Turf</label><div class="input-wrap"><input type="number" id="calc-turf" placeholder="0" min="0" step="100" /><span class="unit">m²</span></div></div>
            </div>
          </div>

          <div class="calc-form-section">
            <div class="calc-section-title">Water Billing</div>
            <div class="calc-fields">
              <div class="calc-field calc-field--full">
                <label for="calc-utility">Utility Provider</label>
                <div class="input-wrap">
                  <select id="calc-utility">
                    <option value="" disabled selected>Select provider</option>
                    <option value="taqa">TAQA (Abu Dhabi)</option><option value="dewa">DEWA (Dubai)</option><option value="sewa">SEWA (Sharjah)</option><option value="other">Other / Unknown</option>
                  </select>
                </div>
              </div>
              <div class="calc-field"><label for="calc-monthly-bill">Monthly Water Bill</label><div class="input-wrap"><input type="number" id="calc-monthly-bill" placeholder="e.g. 35000" min="0" step="500" /><span class="unit">AED</span></div></div>
              <div class="calc-field">
                <label for="calc-irrigation-pct">Irrigation Share</label>
                <div class="input-wrap"><input type="number" id="calc-irrigation-pct" placeholder="e.g. 60" min="0" max="100" step="5" /><span class="unit">%</span></div>
                <div class="hint">Estimated % of total bill attributable to outdoor irrigation</div>
              </div>
              <div class="calc-field calc-field--full">
                <label for="calc-water-source">Irrigation Source</label>
                <div class="input-wrap">
                  <select id="calc-water-source">
                    <option value="potable" selected>Potable (treated municipal)</option><option value="recycled">Recycled / TSE</option><option value="mixed">Mixed</option><option value="unknown">Unknown</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="tariff-info"><strong style="color:var(--color-text-muted);">Tariff reference:</strong> <?php echo esc_html($tariff_info); ?></div>
          </div>

          <div class="calc-form-section">
            <div class="calc-section-title">Benchmark Assumptions</div>
            <p style="font-size:var(--text-xs);color:var(--color-text-faint);margin-bottom:var(--space-3);max-width:none;"><?php echo esc_html($coeff_note); ?></p>
            <button class="assumptions-toggle" id="toggleAssumptions" aria-expanded="false">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
              View / Edit Benchmark Coefficients
            </button>
            <div class="assumptions-panel" id="assumptionsPanel">
              <table class="assumptions-table">
                <thead><tr><th>Plant Type</th><th>Unit</th><th style="text-align:right;">Efficient Demand</th></tr></thead>
                <tbody>
                  <tr><td>Palms</td><td>per tree/month</td><td style="text-align:right;"><input type="number" class="editable" id="coeff-palms" value="<?php echo esc_attr($c_palms); ?>" step="0.1" min="0" /> m³</td></tr>
                  <tr><td>Trees</td><td>per tree/month</td><td style="text-align:right;"><input type="number" class="editable" id="coeff-trees" value="<?php echo esc_attr($c_trees); ?>" step="0.1" min="0" /> m³</td></tr>
                  <tr><td>Shrubs</td><td>per m²/month</td><td style="text-align:right;"><input type="number" class="editable" id="coeff-shrubs" value="<?php echo esc_attr($c_shrubs); ?>" step="0.001" min="0" /> m³</td></tr>
                  <tr><td>Ground Cover</td><td>per m²/month</td><td style="text-align:right;"><input type="number" class="editable" id="coeff-groundcover" value="<?php echo esc_attr($c_groundcover); ?>" step="0.001" min="0" /> m³</td></tr>
                  <tr><td>Grass / Turf</td><td>per m²/month</td><td style="text-align:right;"><input type="number" class="editable" id="coeff-turf" value="<?php echo esc_attr($c_turf); ?>" step="0.001" min="0" /> m³</td></tr>
                </tbody>
              </table>
              <p style="font-size:10px;color:var(--color-text-faint);margin-top:var(--space-3);font-style:italic;">Values are editable for planning scenarios. Must be confirmed against municipality approvals or project-specific engineering data for contractual use.</p>
            </div>
          </div>

          <div class="calc-form-section">
            <button class="btn btn--primary" id="calcBtn" style="width:100%;justify-content:center;">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12l5 5L20 7"/></svg>
              Calculate Savings Estimate
            </button>
            <p style="font-size:11px;color:var(--color-text-faint);text-align:center;margin-top:0.75rem;">Results update automatically as you enter data</p>
          </div>
        </div>

        <!-- Results -->
        <div>
          <div class="results-card" id="resultsCard">
            <div class="results-header"><div class="results-title">Estimated Savings</div></div>
            <div class="results-empty" id="resultsEmpty">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--color-border)" stroke-width="1.5" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 8v4M12 16h.01"/></svg>
              <p style="margin-top:1rem;max-width:none;">Enter your site data to see an indicative savings estimate.</p>
            </div>
            <div class="results-body" id="resultsBody" style="display:none;">
              <div class="result-row"><span class="result-label">Est. current irrigation cost</span><span class="result-value" id="res-current-cost">—</span></div>
              <div class="result-row"><span class="result-label">Est. efficient irrigation demand</span><span class="result-value" id="res-demand-volume">—</span></div>
              <div class="results-divider" aria-hidden="true"></div>
              <div class="result-row"><span class="result-label">Est. efficient irrigation cost</span><span class="result-value" id="res-efficient-cost">—</span></div>
              <div class="result-row"><span class="result-label">Est. excess consumption</span><span class="result-value" id="res-excess">—</span></div>
              <div class="result-row"><span class="result-label">Estimated reduction</span><span class="result-value" id="res-pct">—</span></div>
              <div class="results-savings-box">
                <div class="savings-label">Est. Monthly Savings</div>
                <div class="savings-amount" id="res-monthly">—</div>
                <div class="savings-period">per month / based on entered data</div>
              </div>
              <div class="results-savings-box" style="background:rgba(0,174,203,.04);">
                <div class="savings-label">Est. Annual Savings</div>
                <div class="savings-amount" id="res-annual">—</div>
                <div class="savings-period">per year / indicative</div>
              </div>
            </div>
            <div class="results-disclaimer"><?php echo esc_html($disclaimer); ?></div>
            <div class="calc-submit-area" id="calcCTA" style="display:none;">
              <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn--primary" style="width:100%;justify-content:center;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/></svg>
                Book a Site Assessment
              </a>
              <p style="font-size:11px;color:var(--color-text-faint);text-align:center;">WCS will verify these figures with a full on-site audit and engineering baseline.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
</div>

<script>
(function(){
  var inputs={palms:document.getElementById('calc-palms'),trees:document.getElementById('calc-trees'),shrubs:document.getElementById('calc-shrubs'),groundcover:document.getElementById('calc-groundcover'),turf:document.getElementById('calc-turf'),monthlyBill:document.getElementById('calc-monthly-bill'),irrigationPct:document.getElementById('calc-irrigation-pct'),waterSource:document.getElementById('calc-water-source')};
  var coeffInputs={palms:document.getElementById('coeff-palms'),trees:document.getElementById('coeff-trees'),shrubs:document.getElementById('coeff-shrubs'),groundcover:document.getElementById('coeff-groundcover'),turf:document.getElementById('coeff-turf')};
  var resultsEmpty=document.getElementById('resultsEmpty'),resultsBody=document.getElementById('resultsBody'),calcCTA=document.getElementById('calcCTA');
  var resCurrentCost=document.getElementById('res-current-cost'),resDemandVol=document.getElementById('res-demand-volume'),resEfficientCost=document.getElementById('res-efficient-cost'),resExcess=document.getElementById('res-excess'),resPct=document.getElementById('res-pct'),resMonthly=document.getElementById('res-monthly'),resAnnual=document.getElementById('res-annual');
  function n(i){return parseFloat(i.value)||0;}
  function fmt(n,d){d=d===undefined?0:d;return n.toLocaleString('en-AE',{minimumFractionDigits:d,maximumFractionDigits:d});}
  function fmtAED(n){if(n>=1000000)return'AED '+fmt(n/1000000,2)+'M';if(n>=1000)return'AED '+fmt(n/1000,1)+'K';return'AED '+fmt(n);}
  function calculate(){
    var palms=n(inputs.palms),trees=n(inputs.trees),shrubs=n(inputs.shrubs),groundcover=n(inputs.groundcover),turf=n(inputs.turf),bill=n(inputs.monthlyBill),irrigPct=n(inputs.irrigationPct)/100;
    var cp=parseFloat(coeffInputs.palms.value)||<?php echo (float)$c_palms; ?>;
    var ct=parseFloat(coeffInputs.trees.value)||<?php echo (float)$c_trees; ?>;
    var cs=parseFloat(coeffInputs.shrubs.value)||<?php echo (float)$c_shrubs; ?>;
    var cg=parseFloat(coeffInputs.groundcover.value)||<?php echo (float)$c_groundcover; ?>;
    var cf=parseFloat(coeffInputs.turf.value)||<?php echo (float)$c_turf; ?>;
    if(!bill||!irrigPct){showEmpty();return;}
    var irrigCost=bill*irrigPct;
    var tariff=4.5;
    var utility=document.getElementById('calc-utility')?document.getElementById('calc-utility').value:'';
    if(utility==='taqa')tariff=3.8;else if(utility==='dewa')tariff=5.2;else if(utility==='sewa')tariff=3.5;
    var currentVol=irrigCost/tariff;
    var hasPlants=(palms+trees+shrubs+groundcover+turf)>0;
    var effVol,pct;
    if(hasPlants){
      effVol=(palms*cp)+(trees*ct)+(shrubs*cs)+(groundcover*cg)+(turf*cf);
      if(effVol>=currentVol)effVol=currentVol*0.70;
      pct=Math.max(0,1-effVol/currentVol);
    }else{pct=0.35;effVol=currentVol*(1-pct);}
    var effCost=effVol*tariff,monthly=irrigCost-effCost,annual=monthly*12,excess=currentVol-effVol;
    resCurrentCost.textContent='AED '+fmt(irrigCost)+' / mo';
    resDemandVol.textContent=hasPlants?fmt(effVol,0)+' m³ / mo':'— (enter plant data)';
    resEfficientCost.textContent='AED '+fmt(effCost)+' / mo';
    resExcess.textContent=hasPlants?fmt(excess,0)+' m³ / mo':'Enter plant data above';
    resPct.textContent='~'+fmt(pct*100,0)+'%';
    resMonthly.textContent=fmtAED(monthly)+' / mo';
    resAnnual.textContent=fmtAED(annual)+' / yr';
    resultsEmpty.style.display='none';resultsBody.style.display='flex';calcCTA.style.display='flex';
  }
  function showEmpty(){resultsEmpty.style.display='block';resultsBody.style.display='none';calcCTA.style.display='none';}
  Object.values(inputs).forEach(function(i){if(i){i.addEventListener('input',calculate);i.addEventListener('change',calculate);}});
  Object.values(coeffInputs).forEach(function(i){if(i)i.addEventListener('input',calculate);});
  document.getElementById('calcBtn').addEventListener('click',calculate);
  var toggleBtn=document.getElementById('toggleAssumptions'),panel=document.getElementById('assumptionsPanel');
  if(toggleBtn&&panel){toggleBtn.addEventListener('click',function(){var open=panel.classList.toggle('open');toggleBtn.setAttribute('aria-expanded',open);toggleBtn.querySelector('svg').style.transform=open?'rotate(180deg)':'';});}
})();
</script>

<?php get_footer(); ?>
