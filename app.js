const TSV_URL = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vRtc31Iw2WCRqMZHMqJqFqMWnKBtHLdvo2xhNcGCoKuVf3UHtLq8TM-xnthrxDCVHjjHqWvqk3v7Shb/pub?gid=1114808713&single=true&output=tsv';

const REGIONS_LABELS = {
    'Estado': 'Estado de SP',
    'Capital': 'Capital',
    'Gde SP(1)': 'Grande SP',
    'Interior': 'Interior',
    'Deinter 1': 'Deinter 1 (SJC)',
    'Deinter 2': 'Deinter 2 (Campinas)',
    'Deinter 3': 'Deinter 3 (Ribeirão Preto)',
    'Deinter 4': 'Deinter 4 (Bauru)',
    'Deinter 5': 'Deinter 5 (SJR Preto)',
    'Deinter 6': 'Deinter 6 (Santos)',
    'Deinter 7': 'Deinter 7 (Sorocaba)',
    'Deinter 8': 'Deinter 8 (Pres. Prudente)',
    'Deinter 9': 'Deinter 9 (Piracicaba)',
    'Deinter 10': 'Deinter 10 (Araçatuba)'
};

let rawData = [];
let chartInstance = null;

document.addEventListener('DOMContentLoaded', () => {
    fetchData();
    setupEventListeners();
});

async function fetchData() {
    try {
        const response = await fetch(TSV_URL);
        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
        
        const tsvText = await response.text();
        
        Papa.parse(tsvText, {
            header: true,
            delimiter: "\t",
            skipEmptyLines: true,
            complete: (results) => {
                // Filter where Year and the main metric exist
                rawData = results.data.filter(d => d.Year && d['Ocorrências policiais registradas, por natureza']);
                initFilters();
                updateView();
                document.getElementById('loading-badge').classList.add('d-none');
            }
        });
    } catch (error) {
        console.error('Erro ao buscar dados:', error);
        document.getElementById('loading-badge').textContent = 'Erro ao carregar dados';
        document.getElementById('loading-badge').className = 'badge bg-danger';
    }
}

function initFilters() {
    const ocorrencias = [...new Set(rawData.map(d => d['Ocorrências policiais registradas, por natureza']))].filter(Boolean).sort();
    const anos = [...new Set(rawData.map(d => d.Year))].sort((a, b) => b - a);
    const trimestres = [...new Set(rawData.map(d => d.Quarter))].sort();
    
    const filterTipo = document.getElementById('filter-tipo');
    const filterRegiao = document.getElementById('filter-regiao');
    
    // Popular Métrica (Ocorrência)
    filterTipo.innerHTML = '';
    ocorrencias.forEach(oc => {
        const option = document.createElement('option');
        option.value = oc;
        option.textContent = oc;
        filterTipo.appendChild(option);
    });

    // Criar filtros de tempo se não existirem
    if (!document.getElementById('filter-ano')) {
        const timeContainer = document.createElement('div');
        timeContainer.innerHTML = `
            <div class="mb-3">
                <label class="form-label small fw-bold">Ano</label>
                <select id="filter-ano" class="form-select">
                    <option value="all">Todos os Anos</option>
                    ${anos.map(a => `<option value="${a}">${a}</option>`).join('')}
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Trimestre</label>
                <select id="filter-trimestre" class="form-select">
                    <option value="all">Todos os Trimestres</option>
                    ${trimestres.map(t => `<option value="${t}">${t}</option>`).join('')}
                </select>
            </div>
        `;
        filterRegiao.closest('.mb-3').before(timeContainer);
    }

    if (rawData.length > 0) {
        document.getElementById('link-fonte').href = rawData[0].link || '#';
    }
}

function setupEventListeners() {
    document.addEventListener('change', (e) => {
        if (e.target.id.startsWith('filter-') || e.target.name === 'chartType') {
            updateView();
        }
    });

    document.getElementById('download-png').addEventListener('click', downloadPNG);
    document.getElementById('download-pdf').addEventListener('click', downloadPDF);
}

function parseValue(val) {
    if (!val) return 0;
    return parseInt(val.toString().replace(/\./g, '')) || 0;
}

function updateView() {
    const metric = document.getElementById('filter-tipo').value;
    const regiao = document.getElementById('filter-regiao').value;
    const ano = document.getElementById('filter-ano').value;
    const trimestre = document.getElementById('filter-trimestre').value;
    const chartType = document.querySelector('input[name="chartType"]:checked').value;

    let filtered = rawData.filter(d => d['Ocorrências policiais registradas, por natureza'] === metric);
    
    if (ano !== 'all') filtered = filtered.filter(d => d.Year == ano);
    if (trimestre !== 'all') filtered = filtered.filter(d => d.Quarter === trimestre);

    filtered.sort((a, b) => {
        if (a.Year !== b.Year) return a.Year - b.Year;
        return a.Quarter.localeCompare(b.Quarter);
    });

    updateChart(filtered, regiao, chartType, metric);
    updateTable([...filtered].reverse(), regiao);
}

function updateChart(data, regiao, type, titulo) {
    const ctx = document.getElementById('mainChart').getContext('2d');
    const labels = data.map(d => `${d.Year} ${d.Quarter}`);
    
    if (chartInstance) chartInstance.destroy();

    const colors = ['#0d6efd', '#6610f2', '#6f42c1', '#d63384', '#dc3545', '#fd7e14', '#ffc107', '#198754', '#20c997', '#0dcaf0'];
    let datasets = [];

    if (regiao === 'all') {
        const regionsToDisplay = Object.keys(REGIONS_LABELS).filter(r => r !== 'Estado');
        datasets = regionsToDisplay.map((r, i) => ({
            label: REGIONS_LABELS[r],
            data: data.map(d => parseValue(d[r])),
            borderColor: colors[i % colors.length],
            backgroundColor: colors[i % colors.length] + '44',
            borderWidth: 2,
            tension: 0.3,
            fill: false
        }));
    } else {
        datasets = [{
            label: REGIONS_LABELS[regiao],
            data: data.map(d => parseValue(d[regiao])),
            borderColor: '#0d6efd',
            backgroundColor: type === 'bar' ? '#0d6efd88' : '#0d6efd22',
            borderWidth: 2,
            fill: type === 'line',
            tension: 0.3
        }];
    }

    chartInstance = new Chart(ctx, {
        type: type,
        data: { labels, datasets },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: { display: true, text: titulo, font: { size: 16 } },
                legend: { position: 'bottom' },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                y: { beginAtZero: true, ticks: { callback: (v) => v.toLocaleString('pt-BR') } }
            }
        }
    });
}

function updateTable(data, regiao) {
    const tbody = document.querySelector('#data-table tbody');
    tbody.innerHTML = '';

    data.forEach(d => {
        const row = document.createElement('tr');
        const valor = regiao === 'all' ? d['Estado'] : d[regiao];
        row.innerHTML = `
            <td>${d.Year} - ${d.Quarter}</td>
            <td><small class="text-muted">${d['Ocorrências policiais registradas, por natureza']}</small></td>
            <td class="text-end fw-bold">${parseValue(valor).toLocaleString('pt-BR')}</td>
        `;
        tbody.appendChild(row);
    });
}

function downloadPNG() {
    const link = document.createElement('a');
    link.download = 'estatisticas-criminais-sp.png';
    link.href = document.getElementById('mainChart').toDataURL('image/png');
    link.click();
}

function downloadPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('l', 'mm', 'a4');
    const imgData = document.getElementById('mainChart').toDataURL('image/png');
    doc.setFontSize(16);
    doc.text('Estatísticas Criminais - Estado de São Paulo', 15, 15);
    doc.addImage(imgData, 'PNG', 15, 30, 260, 130);
    doc.save('estatisticas-sp.pdf');
}
