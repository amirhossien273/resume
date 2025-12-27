import React, { useEffect } from "react";
import BarChart from "../components/chart/BarChart";
import { Card, CardBody, Table } from "reactstrap";
import AssetChart from "../components/chart/AssetChart";
import { useDispatch, useSelector } from "react-redux";
import { featchFindOutput } from "../redux/findOutput/findoutput";
import RiskChart from "../components/chart/RiskChart";

const Dashboard = () => {

    const { findOutput } = useSelector( (s) => s);
    const dispatch = useDispatch();
  
    useEffect( () => {
  
      dispatch(featchFindOutput());
    }, []);

  return (
     <div className="row">
        <Card className="card col-md-6 m-auto p-1">
            <CardBody >
                <AssetChart />
            </CardBody>
        </Card>
      <Card className="card col-md-6 m-auto p-1">
            <CardBody >
                <RiskChart />
            </CardBody>
        </Card>
        <Card>
            <label>نمایش تهدیداتی که بیشنرین ریسک پذیریی را دارند</label>
            <CardBody>
            <Table striped bordered hover>
          <thead>
            <tr>
              <th>ردیف</th>
              <th>نام قرار گاه / معاونت</th>
              <th>نوع تهدید</th>
              <th>نوع آسیب پذیری</th>
              <th>نام دارایی</th>
            </tr>
          </thead>
          <tbody>
            {findOutput.data.map( (itme, index) => {
              if( index < 10 ){
               return(
                <tr key={index}>
                    <td>{index + 1}</td>
                    <td>{itme.organ.name}</td>
                    <td>
                      {itme.name}
                    </td>
                    <td>
                      {itme.threat.name}
                    </td>
                    <td>
                      {itme.threat.asset.name}
                    </td>
                </tr>
               )
            }
            })}
          </tbody>
        </Table>
            </CardBody>
        </Card>
     </div>

  );
};

export default Dashboard;