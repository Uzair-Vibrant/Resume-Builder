

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            let count = +counter.innerText;
            const increment = target / 100;
            if(count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 15);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });

    // Resume Submissions Chart
    const ctx1 = document.getElementById('resumesChart').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: {!! json_encode($resumeMonths ?? ['Jan','Feb','Mar','Apr','May','Jun']) !!},
            datasets: [{
                label: 'Resumes Submitted',
                data: {!! json_encode($resumeCounts ?? [5,8,6,10,7,9]) !!},
                backgroundColor: 'rgba(78,115,223,0.8)',
                borderRadius: 8,
                maxBarThickness: 25
            }]
        },
        options: { responsive:true, plugins:{ legend:{ display:false } }, scales:{ y:{ beginAtZero:true } } }
    });

    // ATS Score Chart
    const ctx2 = document.getElementById('atsChart').getContext('2d');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: {!! json_encode($atsMonths ?? ['Jan','Feb','Mar','Apr','May','Jun']) !!},
            datasets: [{
                label: 'ATS Score %',
                data: {!! json_encode($atsScores ?? [75,80,78,85,82,90]) !!},
                backgroundColor:'rgba(28,200,138,0.2)',
                borderColor:'#1cc88a',
                borderWidth:3,
                fill:true,
                tension:0.4,
                pointBackgroundColor:'#17a673',
                pointRadius:5
            }]
        },
        options:{ responsive:true, plugins:{ legend:{ display:false } }, scales:{ y:{ beginAtZero:true, max:100 } } }
    });
</script>

<style>
    /* Metric Card Hover */
    .hover-metric:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 15px 30px rgba(0,0,0,0.25);
    }

    .overlay-shape {
        position: absolute;
        top: -20px;
        right: -20px;
        width: 80px;
        height: 80px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }

    /* Quick Action Hover */
    .hover-action:hover {
        transform: translateY(-8px) scale(1.05);
        box-shadow: 0 12px 25px rgba(0,0,0,0.2);
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    /* Optional: Add subtle background patterns for depth */
    body {
        background: linear-gradient(to right, #f4f6f9, #e9ecef);
    }
</style>