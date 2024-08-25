<?php include('db_connect.php') ?>
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Info boxes -->
<?php if ($_SESSION['login_type'] == 1) : ?>
  <div class="row justify-content-center" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-weight: 500;">
    <!-- Total Students Box -->
    <div class="col-12 col-md-6 mb-3">
      <div class="info-box mx-auto" style="max-width: 100%; background: #e0e0e0; box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff; border-radius: 15px; padding: 15px;">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Students</span>
          <span class="info-box-number">
            <?php echo $conn->query("SELECT * FROM students")->num_rows; ?>
          </span>
        </div>
      </div>
      <canvas id="studentsColumnChart" style="height: 200px;"></canvas>
    </div>
    <!-- Total Classes Box -->
    <div class="col-12 col-md-6 mb-3">
      <div class="info-box mx-auto" style="max-width: 100%; background: #e0e0e0; box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff; border-radius: 15px; padding: 15px;">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-list-alt"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Classes</span>
          <span class="info-box-number">
            <?php echo $conn->query("SELECT * FROM classes")->num_rows; ?>
          </span>
        </div>
      </div>
      <canvas id="classesLineChart" style="height: 200px;"></canvas>
    </div>
    <!-- Total Subjects Box -->
    <div class="col-12 col-md-6 mb-3">
      <div class="info-box mx-auto" style="max-width: 100%; background: #e0e0e0; box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff; border-radius: 15px; padding: 15px;">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-book-open"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Subjects</span>
          <span class="info-box-number">
            <?php echo $conn->query("SELECT * FROM subjects")->num_rows; ?>
          </span>
        </div>
      </div>
      <canvas id="subjectsDoughnutChart" style="height: 200px;"></canvas>
    </div>
    <!-- Total Results Box -->
    <div class="col-12 col-md-6 mb-3">
      <div class="info-box mx-auto" style="max-width: 100%; background: #e0e0e0; box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff; border-radius: 15px; padding: 15px;">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-alt"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Results</span>
          <span class="info-box-number">
            <?php echo $conn->query("SELECT * FROM results")->num_rows; ?>
          </span>
        </div>
      </div>
      <canvas id="resultsBubbleChart" style="height: 200px;"></canvas>
    </div>
  </div>

<?php else : ?>
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        Welcome <?php echo $_SESSION['login_name'] ?>!
      </div>
    </div>
  </div>
<?php endif; ?>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Column Chart for Total Students without point values
    var ctxStudentsColumn = document.getElementById('studentsColumnChart').getContext('2d');
    new Chart(ctxStudentsColumn, {
      type: 'bar',
      data: {
        labels: ['Total Students'],
        datasets: [{
          label: 'Number of Students',
          data: [<?php echo $conn->query("SELECT * FROM students")->num_rows; ?>],
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            enabled: false
          }
        },
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: 'Category'
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: 'Value'
            },
            ticks: {
              beginAtZero: true,
              stepSize: 1
            }
          }
        }
      }
    });

    // Line Chart for Total Classes
    var ctxClassesLine = document.getElementById('classesLineChart').getContext('2d');
    new Chart(ctxClassesLine, {
      type: 'line',
      data: {
        labels: ['Classes'],
        datasets: [{
          label: 'Total Classes',
          data: [<?php echo $conn->query("SELECT * FROM classes")->num_rows; ?>],
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 2,
          pointBackgroundColor: 'rgba(54, 162, 235, 1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(54, 162, 235, 1)',
          fill: true,
          tension: 0.1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'top',
          },
          tooltip: {
            mode: 'index',
            intersect: false,
          }
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: 'Category'
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: 'Value'
            },
            ticks: {
              beginAtZero: true,
              stepSize: 1
            }
          }
        }
      }
    });

    // Doughnut Chart for Total Subjects
    var ctxSubjectsDoughnut = document.getElementById('subjectsDoughnutChart').getContext('2d');
    new Chart(ctxSubjectsDoughnut, {
      type: 'doughnut',
      data: {
        labels: ['Subjects'],
        datasets: [{
          label: 'Total Subjects',
          data: [<?php echo $conn->query("SELECT * FROM subjects")->num_rows; ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 205, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(201, 203, 207, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'top',
          },
          tooltip: {
            mode: 'index',
            intersect: false,
          }
        }
      }
    });

    // Bubble Chart for Total Results
    var ctxResultsBubble = document.getElementById('resultsBubbleChart').getContext('2d');
    new Chart(ctxResultsBubble, {
      type: 'bubble',
      data: {
        datasets: [{
          label: 'Total Results',
          data: [{
            x: 1,
            y: <?php echo $conn->query("SELECT * FROM results")->num_rows; ?>,
            r: 10
          }],
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'top',
          },
          tooltip: {
            mode: 'index',
            intersect: false,
          }
        },
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: 'Category'
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: 'Value'
            },
            ticks: {
              beginAtZero: true,
              stepSize: 1
            }
          }
        }
      }
    });
  });
</script>
