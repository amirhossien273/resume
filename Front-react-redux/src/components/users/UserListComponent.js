import React from "react";
import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Card, CardBody, Table } from "reactstrap";
import { featchUsers } from "../../redux/user/user";

const UserListComponent = () => {

  const { user } = useSelector( (s) => s);
  const dispatch = useDispatch();

  useEffect( () => {

    dispatch(featchUsers());
  }, []);
  return (
    <>
    <Card className="card col-12 m-auto p-1">
      <CardBody >
       <Table striped bordered hover>
          <thead>
            <tr>
              <th>ردیف</th>
              <th> نام</th>
              <th>نام خانوادگی</th>
              <th>شماره همراه</th>
              <th>کد ملی</th>
              <th>سمت</th>
            </tr>
          </thead>
          <tbody>
            {user.data.map( (itme, index) => {
               return(
                <tr key={index}>
                    <td>{index + 1}</td>
                    <td>{itme.name}</td>
                    <td>{itme.lastName}</td>
                    <td>{itme.phone}</td>
                    <td>{itme.nationalCode}</td>
                    <td>{itme.roles[0].name == "ROLE_ADMIN" ? "مدیر کل" : `کارشناس ${itme.group[0].name}` }</td>
                </tr>
               )
            })}
          </tbody>
        </Table>
      </CardBody>
    </Card>
    </>
  );
};

export default UserListComponent;
