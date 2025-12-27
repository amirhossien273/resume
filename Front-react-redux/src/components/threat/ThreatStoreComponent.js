import React, { useState } from "react";
import Select from "react-select";
import { Button, Card, CardBody, Col, Form, Row, Spinner, Table } from "reactstrap";
import { featchAssets } from "../../redux/asset/asset";
import { useDispatch, useSelector } from "react-redux";
import { Controller, useForm } from "react-hook-form";
import { featchThreats, insertThreat } from "../../redux/threat/threat";
import { useEffect } from "react";
import SelectThreatModel from "./SelectThreatModelComponent";

const ThreatStoreComponent = () => {

  const dispatch = useDispatch();
  const { SelectThreat, createThreat } = useSelector((s) => s);
  const { asset, threat } = useSelector((s) => s);
  const { loading } = useSelector((s) => s.createThreat);

  const [isSelectTravelModalOpen, setIsSelectTravelModalOpen] = useState(false);

  const toggleSelectTravelModal = () => {
    setIsSelectTravelModalOpen(!isSelectTravelModalOpen);
  };

  const handleSelectTravelButtonClick = (appointmentId, userId) => {
    setIsSelectTravelModalOpen(true);
  };

  const threatForm = {
    name: "",
    asset_id: ""
   };

   const {
    control,
    handleSubmit,
    formState: { errors, isDirty, defaultValues },
  } = useForm({
    defaultValues: threatForm,
  });

  useEffect(() =>{
    dispatch(featchAssets());
    dispatch(featchThreats());
  },[])

   const assets = asset?.data?.map((item) => {
    return {
      value: item.id,
      label: `${item.centerName} > ${item.name}`,
    };
  });

  const creatThreat = (data) => {

    const arrayData = [];
    const arrayDataInsert = [];
  const object = SelectThreat.selectData;
  const objectScor = SelectThreat.selectDataScor;
  const objectScorInsert = SelectThreat.selectDataScorInsert;

  for (const index in objectScorInsert) {
    arrayDataInsert.push({
      name: objectScorInsert[index].name,
      scor: objectScorInsert[index].score,
      parent_id: index
    });
  }
 
  for (const index in object) {
    arrayData.push({
      option_id: object[index].optin_id,
      scor: objectScor[object[index].optin_id].scor
    });
  } 

  Object.assign(data ,{select: arrayData, selectInsert: arrayDataInsert});
    dispatch(insertThreat(data));
    dispatch(featchThreats());
  };

  return (
    <>
    <Card className="card col-12 m-auto p-1">
      <CardBody >
        <Form onSubmit={handleSubmit(creatThreat)} class="auth-login-form">
          <Row >
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="asset_id"
                render={({ field }) => (
                  <Select
                    id="asset_id"
                    isClearable={false}
                    placeholder="دارایی را انتخاب کنید..."
                    className="react-select"
                    classNamePrefix="select"
                    isMulti={false}
                    // styles={customStyles}
                    inputRef={field.ref}
                    name={field.name}
                    options={assets}
                    value={assets?.find((c) => c.value === field.value)}
                    onChange={(selectedOption) => {
                      field.onChange(selectedOption.value);
                    }}
                  />
                )}
              />
              {errors.asset_id && <p className="text-danger ms-1 text-end">دارایی را انتخاب کنید!</p>}
            </Col>
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="name"
                render={({ field }) => (
                  <input className={`form-control ${(errors.phone) ? 'border-danger': ''}`} {...field} placeholder="آسیب پذیری را وارد کنید."id="threatStore" type="text"  />
                )}
              />
              {errors.name && <p className="text-danger ms-1 text-end">آسیب پذیری را وارد کنید!</p>}
            </Col>
            
            <Col className="mb-1 col-6">
              <button
              type="button"
                onClick={() => {
                  handleSelectTravelButtonClick();
                }}
                className="btn btn-bitbucket"
              >
                ارزیابی آسیب پذیری
              </button>
            </Col>
            <Col className="mb-1 col-12">
            <Button   
                type="submit"
                color="primary"
                disabled={loading} 
                className="w-50 d-block m-auto">
                  {loading === true ? <Spinner size="sm" /> : ""}
                  <span className="ms-1">ثبت آسیب پذیری</span>
              </Button>
            </Col>
          </Row>
        </Form>
        <Table striped bordered hover>
          <thead>
            <tr>
              <th>ردیف</th>
              <th>مرکز</th>
              <th>نام دارایی</th>
              <th>نام آسیب پذیریی</th>
              {/* <th>#</th> */}
            </tr>
          </thead>
          <tbody>
            {threat?.data?.map((item, index) => {
              return(
                <tr key={index}>
                <td>{index + 1}</td>
                <td>{item.centerName}</td>       
                <td>{item.assetName}</td>       
                <td>{item.name}</td>       
              </tr>
              )
            })}
          </tbody>
        </Table>
      </CardBody>
    </Card>
      <SelectThreatModel
          isOpen={isSelectTravelModalOpen}
          toggleModal={toggleSelectTravelModal}
        />
    </>
  );
};

export default ThreatStoreComponent;
