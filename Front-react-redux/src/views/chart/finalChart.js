import "@styles/react/pages/page-authentication.scss";
import ThreatStoreComponent from "../../components/threat/ThreatStoreComponent";
import { useEffect } from "react";
import { useDispatch } from "react-redux";
import { Card, CardBody } from "reactstrap";
import ShowChart from "../../components/chart/ShowChartComponent";

const finalChart = () => {


  return (
    <Card className="card col-12 m-auto p-1">
       <CardBody >
          <ShowChart />
       </CardBody>
    </Card>
  );
};

export default finalChart;