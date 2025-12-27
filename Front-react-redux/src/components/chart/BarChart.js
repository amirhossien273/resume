import React, { useEffect, useState } from "react";
import axios from "axios";
import { Bar } from "react-chartjs-2";
import Service from "../../services/api/Service";

const BarChart = () => {
  const [chartData, setChartData] = useState(null);

  useEffect(() => {
    const fetchAssetData = async () => {
      try {
        const response = await Service.fetchgAssetCountByOrgan();
        if (response && typeof response === "object") {
            const data = response;
      
            const labels = Object.keys(data);
            const values = Object.values(data);
      
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
          } else {
            console.log("datadata",response );
            console.error("API داده‌های نامعتبر بازگرداند.");
          }
      } catch (error) {
        console.error("خطا در دریافت اطلاعات دارایی‌ها", error);
      }
    };

    fetchAssetData();
  }, []);

  return (
    <div style={{ margin: "0 auto", textAlign: "center" }}>
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
            },
          }}
        />
      ) : (
        <p>در حال بارگذاری داده‌ها...</p>
      )}
    </div>
  );
};

export default BarChart;
