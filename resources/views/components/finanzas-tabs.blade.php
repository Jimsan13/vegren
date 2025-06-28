<div class="finanzas-tabs-container">
    <ul class="nav nav-tabs mb-4 finanzas-tabs" id="finanzasTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('finanzas') || request()->is('finanzas/estado-financiero') ? 'active' : '' }}" 
               id="estado-financiero-tab" data-toggle="tab" href="#estadoFinanciero" role="tab" 
               aria-controls="estadoFinanciero" aria-selected="{{ request()->is('finanzas') || request()->is('finanzas/estado-financiero') ? 'true' : 'false' }}">
                Estado Financiero
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('finanzas/deudas') ? 'active' : '' }}" 
               id="deudas-tab" data-toggle="tab" href="#deudas" role="tab" 
               aria-controls="deudas" aria-selected="{{ request()->is('finanzas/deudas') ? 'true' : 'false' }}">
                Deudas
            </a>
        </li>
    </ul>

    <div class="tab-content" id="finanzasTabsContent">
        {{-- Estado Financiero Tab Content (image_33fc37.png, image_33fc17.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas') || request()->is('finanzas/estado-financiero') ? 'show active' : '' }}" 
             id="estadoFinanciero" role="tabpanel" aria-labelledby="estado-financiero-tab">
            
            <h4 class="fw-bold text-success mb-4">Estado Financiero General</h4> {{-- Changed to h4 as h3 is in the parent layout --}}

            <div class="row">
                <div class="col-md-4">
                    <div class="card-summary available-balance">
                        <i class="fas fa-money-bill-wave icon"></i>
                        <div>
                            <div class="title">Saldo disponible</div>
                            <div class="value">$124,500</div>
                            <div class="description">Fondos actuales en caja</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary net-profit">
                        <i class="fas fa-chart-line icon"></i>
                        <div>
                            <div class="title">Ganancia neta</div>
                            <div class="value">$18,200</div>
                            <div class="description">Resultado del mes actual</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary accumulated-debt">
                        <i class="fas fa-exclamation-triangle icon"></i>
                        <div>
                            <div class="title">Deudas acumuladas</div>
                            <div class="value">$32,000</div>
                            <div class="description">Insumos, nómina y proveedores</div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="mt-4">Movimientos Recientes</h4>
            <div class="details-section">
                {{-- Headers --}}
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                    <div class="icon"></div>
                    <div class="info col-date">Fecha</div>
                    <div class="info col-info">Descripción</div>
                    <div class="info col-amount text-right">Monto</div>
                    <div class="info col-status text-right">Tipo</div>
                    <div class="col-action-icon"></div>
                </div>
                {{-- Movement Examples from image_33fc37.png --}}
                <div class="details-item">
                    <i class="fas fa-calendar-alt icon"></i>
                    <div class="info col-date">2024-06-10</div>
                    <div class="info col-info">Venta de tomates - Lote 12 - Caja 3</div>
                    <div class="info col-amount text-success">$2,500</div>
                    <div class="info col-status">Ingreso</div>
                    <div class="col-action-icon"><i class="fas fa-info-circle"></i></div>
                </div>
                <div class="details-item">
                    <i class="fas fa-calendar-alt icon"></i>
                    <div class="info col-date">2024-06-09</div>
                    <div class="info col-info">Compra fertilizante - Lote 8</div>
                    <div class="info col-amount text-danger">$1,000</div>
                    <div class="info col-status">Egreso</div>
                    <div class="col-action-icon"><i class="fas fa-info-circle"></i></div>
                </div>
                <div class="details-item">
                    <i class="fas fa-calendar-alt icon"></i>
                    <div class="info col-date">2024-06-08</div>
                    <div class="info col-info">Pago nómina - Lote 5</div>
                    <div class="info col-amount text-danger">$3,200</div>
                    <div class="info col-status">Egreso</div>
                    <div class="col-action-icon"><i class="fas fa-info-circle"></i></div>
                </div>
            </div>

            <h4 class="mt-4">Reporte de Ingresos</h4>
            <div class="chart-container">
                <ul class="nav chart-nav">
                    <li class="nav-item">
                        <a class="nav-link active" id="mes-actual-tab" data-toggle="tab" href="#mesActual" role="tab" aria-controls="mesActual" aria-selected="true">Mes actual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mes-anterior-tab" data-toggle="tab" href="#mesAnterior" role="tab" aria-controls="mesAnterior" aria-selected="false">Mes anterior</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="mesActual" role="tabpanel" aria-labelledby="mes-actual-tab">
                        <div class="placeholder-bar-chart"></div>
                    </div>
                    <div class="tab-pane fade" id="mesAnterior" role="tabpanel" aria-labelledby="mes-anterior-tab">
                        <div class="placeholder-chart">Gráfica de Ingresos (Mes Anterior)</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Deudas Tab Content (image_33fb3b.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas/deudas') ? 'show active' : '' }}" 
             id="deudas" role="tabpanel" aria-labelledby="deudas-tab">
            
            <h4 class="mb-3">Resumen de Deudas</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-summary total-debt">
                        <i class="fas fa-hand-holding-usd icon"></i>
                        <div>
                            <div class="title">Total Deuda</div>
                            <div class="value">$45,000</div>
                            <div class="description">Saldo pendiente</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary pending-payments">
                        <i class="fas fa-hourglass-half icon"></i>
                        <div>
                            <div class="title">Pagos Vencidos</div>
                            <div class="value">$8,500</div>
                            <div class="description">Al día de hoy</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary paid-payments">
                        <i class="fas fa-check-circle icon"></i>
                        <div>
                            <div class="title">Último Pago</div>
                            <div class="value">$2,000</div>
                            <div class="description">15 Jun 2024</div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="mt-4">Historial de Pagos</h4>
            <div class="details-section">
                {{-- Headers for Historial de Pagos --}}
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                    <div class="icon"></div>
                    <div class="info col-date">Fecha</div>
                    <div class="info">Banco / Proveedor</div>
                    <div class="info">Concepto</div>
                    <div class="info col-amount text-right">Monto</div>
                    <div class="info col-amount-due text-right">Saldo Anterior</div>
                    <div class="col-action-icon-debt"></div>
                </div>
                {{-- Payment History Examples from image_33fb3b.png --}}
                <div class="details-item debt-item">
                    <i class="fas fa-calendar-check icon"></i>
                    <div class="info col-date">2024-06-16</div>
                    <div class="info">Banco Rural</div>
                    <div class="info">Compra insumos</div>
                    <div class="info col-amount text-success">$2,500</div>
                    <div class="info col-amount-due">$3,000</div>
                    <div class="col-action-icon-debt"><i class="fas fa-ellipsis-h"></i></div>
                </div>
                <div class="details-item debt-item">
                    <i class="fas fa-calendar-check icon"></i>
                    <div class="info col-date">2024-06-10</div>
                    <div class="info">Banco Rural</div>
                    <div class="info">Compra fertilizante</div>
                    <div class="info col-amount text-success">$3,000</div>
                    <div class="info col-amount-due">$3,000</div>
                    <div class="col-action-icon-debt"><i class="fas fa-ellipsis-h"></i></div>
                </div>
            </div>

            <h4 class="mt-4">Próximos Vencimientos</h4>
            <div class="details-section">
                {{-- Headers for Próximos Vencimientos --}}
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                    <div class="icon"></div>
                    <div class="info col-date">Fecha Vencimiento</div>
                    <div class="info">Proveedor / Concepto</div>
                    <div class="info">Monto Original</div>
                    <div class="info col-status text-right">Estado</div>
                    <div class="info col-amount text-right">Monto a Pagar</div>
                    <div class="col-pay-button"></div>
                </div>
                {{-- Upcoming Due Dates Examples from image_33fb3b.png --}}
                <div class="details-item debt-item">
                    <i class="fas fa-exclamation-circle icon text-danger"></i>
                    <div class="info col-date">2024-06-25</div>
                    <div class="info">Proveedor Agua - Compra fertilizante</div>
                    <div class="info">$2,000</div>
                    <div class="info col-status text-warning">Pendiente</div>
                    <div class="info col-amount">$2,000</div>
                    <div class="col-pay-button">
                        <button class="btn btn-sm-pay">Pagar</button>
                    </div>
                </div>
                <div class="details-item debt-item">
                    <i class="fas fa-exclamation-circle icon text-warning"></i>
                    <div class="info col-date">2024-07-01</div>
                    <div class="info">Banco Rural</div>
                    <div class="info">$4,000</div>
                    <div class="info col-status text-warning">Pendiente</div>
                    <div class="info col-amount">$4,000</div>
                    <div class="col-pay-button">
                        <button class="btn btn-sm-pay">Pagar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- All the CSS styles --}}
<style>
    /* Styles for finanzas-tabs component */
    .finanzas-tabs .nav-link {
        color: #495057;
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        padding: .5rem 1rem;
    }
    .finanzas-tabs .nav-link.active {
        color: #28a745; /* Green for active tab */
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
        font-weight: bold;
    }

    /* Card Summary Styles (consistent) */
    .card-summary {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,.05);
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .card-summary .icon {
        font-size: 2.5em;
        margin-right: 15px;
        color: #28a745; /* Default green */
    }
    .card-summary .title {
        font-size: 0.9em;
        color: #6c757d;
        margin-bottom: 5px;
    }
    .card-summary .value {
        font-size: 1.5em;
        font-weight: bold;
        color: #343a40;
    }
    .card-summary .description {
        font-size: 0.8em;
        color: #6c757d;
    }
    /* Specific icon colors for finance cards */
    .card-summary.available-balance .icon { color: #28a745; } /* Green */
    .card-summary.net-profit .icon { color: #17a2b8; } /* Info blue */
    .card-summary.accumulated-debt .icon { color: #dc3545; } /* Red */
    .card-summary.total-debt .icon { color: #dc3545; } /* Red for total debt */
    .card-summary.pending-payments .icon { color: #ffc107; } /* Yellow for pending payments */
    .card-summary.paid-payments .icon { color: #28a745; } /* Green for paid payments */


    /* Chart container */
    .chart-container {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,.05);
        margin-bottom: 20px;
    }

    /* Recent Movements / Details Section (Table-like list - consistent with previous) */
    .details-section {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,.05);
        margin-bottom: 20px;
    }
    .details-item {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }
    .details-item:last-child {
        border-bottom: none;
    }
    .details-item .icon {
        font-size: 1.2em;
        margin-right: 15px;
        color: #6c757d;
        width: 25px; /* Adjust icon width for alignment */
        text-align: center;
    }
    .details-item .col-date, .details-item .col-concept, .details-item .col-amount, .details-item .col-status {
        flex: 1;
        padding: 0 5px;
    }
    .details-item .col-info { /* General info column */
        flex: 1.5;
        padding: 0 5px;
        font-size: 0.95em;
    }
    .details-item .col-action-icon {
        width: 30px;
        text-align: right;
        color: #6c757d;
    }
    .details-item .col-amount {
        text-align: right;
        font-weight: bold;
    }
    .details-item .col-status {
        text-align: right;
        font-weight: bold;
    }
    .text-success { color: #28a745 !important; }
    .text-danger { color: #dc3545 !important; }
    .text-warning { color: #ffc107 !important; } /* For 'Pendiente' */

    /* Specific styles for the Deudas section details */
    .details-section .debt-item .col-amount-due {
        flex: 0.7; /* Smaller for amount due */
        text-align: right;
    }
    .details-section .debt-item .col-action-icon-debt {
        width: 20px; /* Even smaller for debt action icon */
        text-align: right;
    }
    .details-section .debt-item .col-due-date {
        flex: 0.8;
        text-align: center;
    }
    .details-section .debt-item .col-pay-button {
        width: 100px; /* Fixed width for pay button column */
        text-align: right;
        flex-shrink: 0;
    }
    .btn-sm-pay {
        padding: .25rem .5rem;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem;
        background-color: #28a745;
        color: white;
        border: none;
    }
    .btn-sm-pay:hover {
        background-color: #218838;
    }

    /* Simple placeholder for chart */
    .placeholder-chart {
        background-color: #e9ecef;
        height: 250px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #6c757d;
        font-size: 1.2em;
        border-radius: 5px;
    }
    .placeholder-bar-chart {
        width: 100%;
        height: 250px;
        background: linear-gradient(to top, #28a745 5%, #28a745 10%, #28a745 8%, #28a745 15%, #28a745 12%, #28a745 20%, #28a745 18%, #28a745 25%, #28a745 22%, #28a745 30%, #28a745 28%, #28a745 35%);
        background-size: 8% 100%; /* Simulate bars */
        background-repeat: repeat-x;
        background-position: bottom;
        border-radius: 5px;
        position: relative;
    }
    .placeholder-bar-chart::before {
        content: "Gráfica de Ingresos (simulada)";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    .chart-nav {
        margin-bottom: 15px;
    }
    .chart-nav .nav-link {
        padding: .25rem .75rem;
        font-size: .9em;
        color: #6c757d;
        border-bottom: 2px solid transparent;
    }
    .chart-nav .nav-link.active {
        font-weight: bold;
        color: #28a745;
        border-color: #28a745;
    }
</style>

{{-- All the JavaScript --}}
<script>
    // Ensure Bootstrap's JS is loaded *before* this script runs for proper tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Handle initial tab activation based on URL
        var currentPath = window.location.pathname;
        var tabs = document.querySelectorAll('.finanzas-tabs .nav-link');
        var anyTabActive = false;

        tabs.forEach(function(tab) {
            var tabHref = tab.getAttribute('href'); // e.g., #estadoFinanciero, #deudas
            var tabName = tabHref.replace('#', ''); // e.g., estadoFinanciero, deudas

            // Determine if this tab should be active
            var shouldBeActive = false;
            if (tabName === 'estadoFinanciero' && (currentPath === '/finanzas' || currentPath.includes('/finanzas/estado-financiero'))) {
                shouldBeActive = true;
            } else if (currentPath.includes('/finanzas/' + tabName)) {
                shouldBeActive = true;
            }

            if (shouldBeActive) {
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');
                var tabPane = document.querySelector(tabHref);
                if (tabPane) {
                    tabPane.classList.add('show', 'active');
                }
                anyTabActive = true;
            } else {
                tab.classList.remove('active');
                tab.setAttribute('aria-selected', 'false');
                var tabPane = document.querySelector(tabHref);
                if (tabPane) {
                    tabPane.classList.remove('show', 'active');
                }
            }
        });

        // Fallback: If no specific tab matches (e.g., direct access to /finanzas and no sub-route matched), activate 'Estado Financiero' by default
        if (!anyTabActive) {
             var defaultTab = document.getElementById('estado-financiero-tab');
             if (defaultTab) {
                defaultTab.classList.add('active');
                defaultTab.setAttribute('aria-selected', 'true');
                var defaultTabPane = document.querySelector(defaultTab.getAttribute('href'));
                if (defaultTabPane) {
                    defaultTabPane.classList.add('show', 'active');
                }
             }
        }
    });

    // Re-initialize Bootstrap tab switching functionality
    // This assumes jQuery is available, as indicated in your initial script.
    // If you are using Bootstrap 5+, replace jQuery with native JS tab API.
    if (typeof jQuery !== 'undefined') {
        $(document).ready(function() {
            // Main Finanzas Tabs
            $('#finanzasTabs a').on('click', function (e) {
                e.preventDefault();
                $(this).tab('show');
            });
            // Nested Chart Tabs
            $('.chart-nav a').on('click', function (e) {
                e.preventDefault();
                $(this).tab('show');
            });
        });
    } else {
        // Fallback for non-jQuery Bootstrap tab activation for Finanzas Tabs
        document.querySelectorAll('#finanzasTabs a').forEach(function(tabLink) {
            tabLink.addEventListener('click', function(e) {
                e.preventDefault();
                var targetId = this.getAttribute('href').substring(1);
                var targetPane = document.getElementById(targetId);

                document.querySelectorAll('.tab-content .tab-pane').forEach(function(pane) {
                    pane.classList.remove('show', 'active');
                });
                document.querySelectorAll('.finanzas-tabs .nav-link').forEach(function(link) {
                    link.classList.remove('active');
                    link.setAttribute('aria-selected', 'false');
                });

                targetPane.classList.add('show', 'active');
                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
            });
        });

        // Fallback for non-jQuery Bootstrap tab activation for Chart Tabs (Mes actual/anterior)
        document.querySelectorAll('.chart-nav a').forEach(function(tabLink) {
            tabLink.addEventListener('click', function(e) {
                e.preventDefault();
                var targetId = this.getAttribute('href').substring(1);
                var targetPane = document.getElementById(targetId);

                // Find the parent tab-content that contains these chart tabs
                var parentTabContent = this.closest('.chart-container').querySelector('.tab-content');
                if (parentTabContent) {
                    parentTabContent.querySelectorAll('.tab-pane').forEach(function(pane) {
                        pane.classList.remove('show', 'active');
                    });
                }
                
                // Deactivate all chart tab links
                this.closest('.chart-nav').querySelectorAll('.nav-link').forEach(function(link) {
                    link.classList.remove('active');
                    link.setAttribute('aria-selected', 'false');
                });

                // Show target pane and activate link
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                }
                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
            });
        });
    }
</script>