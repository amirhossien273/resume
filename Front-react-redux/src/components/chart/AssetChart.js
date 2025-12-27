import React, { useEffect, useState } from "react";
import axios from "axios";
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend,
} from "chart.js";
import { Bar } from "react-chartjs-2";
import Service from "../../services/api/Service";

// ثبت مقیاس‌ها و اجزای Chart.js
ChartJS.register(
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend
);

const AssetChart = () => {
  const [chartData, setChartData] = useState(null);

  useEffect(() => {
    const fetchAssetData = async () => {
      try {
        const response = await Service.fetchgAssetCountByOrgan();
        const data = response;

        const labels = Object.keys(data || {});
        const values = Object.values(data || {});

        setChartData({
          labels,
          datasets: [
            {
              label: "تعداد دارایی‌ها",
              data: values,
              backgroundColor: "rgba(75, 192, 192, 0.6)",
              borderColor: "rgba(75, 192, 192, 1)",
              borderWidth: 1,
            },
          ],
        });
      } catch (error) {
      }
    };

    fetchAssetData();
  }, []);

  return (
    <div>
      <h2>تعداد دارایی‌ها به تفکیک </h2>
      {chartData ? (
        <Bar
          data={chartData}
          options={{
            responsive: true,
            plugins: {
              legend: {
                display: true,
                position: "top",
              },
              title: {
                display: true,
                text: "چارت دارایی‌ها بر اساس ",
              },
            },
          }}
        />
      ) : (
        <p>در حال بارگذاری داده‌ها...</p>
      )}
    </div>
  );
};

export default AssetChart;
