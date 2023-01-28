import Chart from '../chartjs/auto'

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.fontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.fontColor = '#858796';

(async function () {
  new Chart(
    document.getElementById('myPieChart'),
    {
      type: 'doughnut',
      data: {
        datasets: [
          {
            data: [55, 30, 15],
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          padding: {
            x: 15,
            y: 15
          },
          displayColors: false,
          caretPadding: 10,
          labels: ["Direct", "Referral", "Social"],
        },
        legend: {
          display: false
        },
        cutout: 100,
      },
    }
  );
})();
