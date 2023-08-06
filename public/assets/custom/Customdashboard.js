// JavaScript
function createApexChart(chartId, data, color) {
    const chartConfig = {
        chart: {
            type: 'line',
            height: 40,
            width: 100,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 1.5,
            dashArray: 0,
        },
        fill: {
            type: 'gradient',
            gradient: {
                opacityFrom: 0.9,
                opacityTo: 0.9,
                stops: [0, 98],
            }
        },
        series: [{
            name: 'Value',
            data: data
        }],
        yaxis: {
            min: 0,
            show: false,
            axisBorder: {
                show: false
            },
        },
        xaxis: {
            show: false,
            axisBorder: {
                show: false
            },
        },
        tooltip: {
            enabled: false,
        },
        colors: [color],
    };

    document.getElementById(chartId).innerHTML = '';
    new ApexCharts(document.querySelector(`#${chartId}`), chartConfig).render();
}

// Chart data and colors
const chartData = [
    [20, 14, 19, 10, 23, 20, 22, 9, 12], // Total Customers
    [0, 14, 20, 22, 9, 12, 19, 10, 0], // Total Drivers
    [20, 20, 22, 9, 14, 19, 10, 25, 12], // Conversion Vehicles
    [20, 20, 22, 9, 12, 14, 19, 10, 25], // Total Fuel Station
    [20, 20, 22, 9, 12, 14, 19, 10, 25], // Total Toll Gate
    [20, 20, 22, 9, 12, 14, 19, 10, 25] // Total Insurance Company
];

const chartColors = [
    "rgb(132, 90, 223)",
    "rgb(35, 183, 229)",
    "rgb(38, 191, 148)",
    "rgb(245, 184, 73)",
    "rgb(245, 184, 73)",
    "rgb(245, 184, 73)"
];

// Create and render the charts
const chartIds = [
    "crm-customers",
    "crm-divers",
    "crm-vehicles",
    "crm-fuel_stations",
    "crm-toll_gate",
    "crm-insurance_company"
];

const backendType = [
    "users",
    "users",
    "vehicles",
    "fuel_stations",
    "toll_gates",
    "insurance_companies"
];

const percentageIds = [
    "per-customers",
    "per-divers",
    "per-vehicles",
    "per-fuel_stations",
    "per-toll_gate",
    "per-insurance_company"
];

for (let i = 0; i < chartIds.length; i++) {
    var count_url = $('#get_count_graph').val() + '/' + chartIds[i] + '/' + backendType[i]
    axios.get(count_url)
        .then(response => {
            console.log(response.data);
            var data = response.data;
            createApexChart(chartIds[i], data, chartColors[i]);
        })
        .catch(error => {
            console.error(error);
        });

    var percentage_url = $('#get_percentage').val() + '/' + chartIds[i] + '/' + backendType[i]
    axios.get(percentage_url)
        .then(response => {
            console.log(response.data);
            var data = response.data;
            $(`.${percentageIds[i]}`).addClass(`text-${data.status}`)
            $(`.${percentageIds[i]}`).html(`${data.percentage_change}%`)
        })
        .catch(error => {
            console.error(error);
        });
}