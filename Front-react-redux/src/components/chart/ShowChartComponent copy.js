
import * as React from "react";
import * as ReactDOM from "react-dom";
import "hammerjs";
import { interpolateCividis } from "d3-scale-chromatic";
import {
  Chart,
  ChartSeries,
  ChartSeriesItem,
} from "@progress/kendo-react-charts";
import { makeDataObjects } from "./make-data-objects";

const ShowChartComponent = () => {

    const data = makeDataObjects(10, 10);
    const color = (e) => interpolateCividis(e.value.value / e.max);
    // console.log("data: ",data);
  return (
         <Chart>
      <ChartSeries>
        <ChartSeriesItem
          type="heatmap"
          data={data}
          color={color}
          xField="a"
          yField="b"
          field="value"
        />
      </ChartSeries>
    </Chart>
  );
};

export default ShowChartComponent;
