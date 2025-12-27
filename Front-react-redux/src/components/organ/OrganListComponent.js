import React from "react";
import { Card, CardBody, Table } from "reactstrap";

const OrganListComponent = () => {
  return (
    <>
    <Card className="card col-12 m-auto p-1">
      <CardBody >
       <Table striped bordered hover>
          <thead>
            <tr>
              <th>ردیف</th>
              <th> نام</th>
              <th>ایجاد شده</th>
              <th>تاریخ ثبت</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
          </tbody>
        </Table>
      </CardBody>
    </Card>
    </>
  );
};

export default OrganListComponent;
