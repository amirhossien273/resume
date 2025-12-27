import React, { useEffect, useState } from 'react';
import { Bar } from 'react-chartjs-2';
import { Chart as ChartJS, CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend } from 'chart.js';
import Service from '../../services/api/Service';

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend);

const RiskChart = () => {
    const [chartData, setChartData] = useState(null);

    useEffect(() => {
        Service.fetchgThreatRisks()
            // .then(response => response.json())
            .then(result => {
                const labels = Object.keys(result.data);
                const data = Object.values(result.data);

                setChartData({
                    labels,
                    datasets: [
                        {
                            label: 'ریسک پذیریی تهدیدات',
                            data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }
                    ]
                });
            });
    }, []);

    return (
        <div>
            {chartData ? (
                <Bar
                    data={chartData}
                    options={{
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Threat Risks',
                            },
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                            },
                        },
                    }}
                />
            ) : (
                <p>Loading...</p>
            )}
        </div>
    );
};

export default RiskChart;
