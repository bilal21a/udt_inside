/* Total Customers chart */
var crm1 = {
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
        data: [20, 14, 19, 10, 23, 20, 22, 9, 12]
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
    colors: ["rgb(132, 90, 223)"],
}
document.getElementById('crm-total-customers').innerHTML = '';
var crm1 = new ApexCharts(document.querySelector("#crm-total-customers"), crm1);
crm1.render();

function crmtotalCustomers() {
    crm1.updateOptions({
        colors: ["rgb(" + myVarVal + ")"],
    });
}
/* Total Customers chart */

/* Total revenue chart */
var crm2 = {
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
        data: [20, 14, 20, 22, 9, 12, 19, 10, 25]
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
    colors: ["rgb(35, 183, 229)"],

}
document.getElementById('crm-total-revenue').innerHTML = '';
var crm2 = new ApexCharts(document.querySelector("#crm-total-revenue"), crm2);
crm2.render();
/* Total revenue chart */

/* Conversion ratio Chart */
var crm3 = {
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
        data: [20, 20, 22, 9, 14, 19, 10, 25, 12]
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
    colors: ["rgb(38, 191, 148)"],

}
document.getElementById('crm-conversion-ratio').innerHTML = '';
var crm3 = new ApexCharts(document.querySelector("#crm-conversion-ratio"), crm3);
crm3.render();
/* Conversion ratio Chart */

/* Total Deals Chart */
var crm4 = {
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
        data: [20, 20, 22, 9, 12, 14, 19, 10, 25]
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
    colors: ["rgb(245, 184, 73)"],

}
document.getElementById('crm-total-deals').innerHTML = '';
var crm4 = new ApexCharts(document.querySelector("#crm-total-deals"), crm4);
crm4.render();
/* Total Deals Chart */