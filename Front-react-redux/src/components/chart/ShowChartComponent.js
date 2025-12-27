import ReactDOM from "react-dom";
import { data } from "./data";
import { Heatmap } from "./Heatmap";
import { featchFindOutput } from "../../redux/findOutput/findoutput";
import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";

const ShowChartComponent = () => {

  const { findOutput } = useSelector( (s) => s);
  const dispatch = useDispatch();

  const data = []

  findOutput.data.map((item, index) => {

 
    data.push({
      x: item.organ.name,
      y: item.name,
      value: item.risck,
    });
  });

  // console.log("item.valueitem.value: ",findOutput);
  useEffect( () => {

    dispatch(featchFindOutput());
  }, []);

  // console.log("data: ",findOutput.data);
  // console.log("datadata: ",data);
    return (
        <>
          <Heatmap data={data} width={1000} height={600} />
        </>
    )
}

export default ShowChartComponent;