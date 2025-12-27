import React, { useEffect, useState } from "react";
import { Button, Card, CardBody, Col, Form, Row, Spinner, Table } from "reactstrap";

import Select from "react-select";
import { Controller, useForm } from "react-hook-form";
import { useDispatch, useSelector } from "react-redux";
import { featchAssets, insertAsset } from "../../redux/asset/asset";
import SelectAssetModel from "../asset/SelectAssetModelComponent";
import { featchCenters } from "../../redux/center/center";

const AssetStoreComponent = () => {

  const dispatch = useDispatch();

  const { SelectAsset, createAsset, center, asset } = useSelector((s) => s);
  
  const { loading } = createAsset

  const [isSelectTravelModalOpen, setIsSelectTravelModalOpen] = useState(false);

  const toggleSelectTravelModal = () => {
    setIsSelectTravelModalOpen(!isSelectTravelModalOpen);
  };

  const handleSelectTravelButtonClick = (appointmentId, userId) => {
    setIsSelectTravelModalOpen(true);
  };

    useEffect(() =>{
      dispatch(featchAssets());
      
    },[])


const dataInsertForm = {
  name: "",
  type: "",
  center_id: "",
};

const {
  control,
  handleSubmit,
  formState: { errors, isDirty, defaultValues },
} = useForm({
  defaultValues: dataInsertForm,
});

const creatAsset = (data) => {

  const arrayData = [];
  const arrayDataInsert = [];
  const object = SelectAsset.selectData;
  const objectScor = SelectAsset.selectDataScor;
  const objectScorInsert = SelectAsset.selectDataInput;

  console.log("selectDataInput: ", SelectAsset.selectDataInput);
 
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


  dispatch(insertAsset(data));
  dispatch(featchAssets());
};


const centers = center?.data?.map( (item) => {


 return {
      value: item.id,
      label: item.name,
  };
});

const types = 
[
    {
      value: 'انسانی',
      label: 'انسانی',
    },
    {
      value: 'معنوی',
      label: 'معنوی',
    },
    {
      value: 'فیزیکی',
      label: 'فیزیکی',
    },
    {
      value: 'اطلاعاتی',
      label: 'اطلاعاتی',
    }
];

useEffect(() => {
  dispatch(featchCenters())
}, []);


  return (
    <Card className="card col-12 m-auto p-1">
      <CardBody >
        <Form onSubmit={handleSubmit(creatAsset)} className="auth-login-form">
          <Row >
          <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="type"
                render={({ field }) => (
                  <Select
                    id="type"
                    isClearable={false}
                    placeholder="نوع دارایی را انتخاب کنید..."
                    className="react-select"
                    classNamePrefix="select"
                    isMulti={false}
                    // styles={customStyles}
                    inputRef={field.ref}
                    name={field.name}
                    options={types}
                    value={types?.find((c) => c.value === field.value)}
                    onChange={(selectedOption) => {
                      field.onChange(selectedOption.value);
                    }}
                  />
                )}
              />
              {errors.type && <p className="text-danger ms-1 text-end">نوع دارایی را انتخاب کنید!</p>}
            </Col>
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="center_id"
                render={({ field }) => (
                  <Select
                    id="center_id"
                    isClearable={false}
                    placeholder=" مرکز را انتخاب کنید..."
                    className="react-select"
                    classNamePrefix="select"
                    isMulti={false}
                    // styles={customStyles}
                    inputRef={field.ref}
                    name={field.name}
                    options={centers}
                    value={centers?.find((c) => c.value === field.value)}
                    onChange={(selectedOption) => {
                      field.onChange(selectedOption.value);
                    }}
                  />
                )}
              />
              {errors.type && <p className="text-danger ms-1 text-end"> مرکز را انتخاب کنید!</p>}
            </Col>
            <Col className="mb-1 col-6">
              <Controller
                  rules={{ required: true }}
                  control={control}
                  name="name"
                  render={({ field }) => (
                    <input className={`form-control ${(errors.name) ? 'border-danger': ''}`} {...field}placeholder="نام دارایی"  id="asset" type="text"  />
                  )}
                />
                {errors.name && <p className="text-danger ms-1 text-end"> !نام دارایی را وارد کنید</p>}
            </Col>
            <Col className="mb-1 col-6">
              <button
                type="button"
                onClick={() => {
                  handleSelectTravelButtonClick();
                }}
                className="btn btn-bitbucket"
              >
               ارزیابی  دارایی
              </button>
            </Col>
            <Col className="mb-1 col-12">
              <Button   
                  type="submit"
                  color="primary"
                  disabled={loading} 
                  className="w-50 d-block m-auto">
                    {loading === true ? <Spinner size="sm" /> : ""}
                    <span className="ms-1">ثبت دارایی</span>
                </Button>
            </Col>
          </Row>
        </Form>
        <Table striped bordered hover>
          <thead>
            <tr>
              <th>ردیف</th>
              <th>مرکز</th>
              <th>نام</th>
              {/* <th>#</th> */}
            </tr>
          </thead>
          <tbody>
            {asset?.data?.map((item, index) => {
              return(
                <tr key={index}>
                <td>{index + 1}</td>
                <td>{item.centerName}</td>       
                <td>{item.name}</td>       
              </tr>
              )
            })}
          </tbody>
        </Table>
      </CardBody>
      <SelectAssetModel
        isOpen={isSelectTravelModalOpen}
        toggleModal={toggleSelectTravelModal}
      />
    </Card>
  );
};

export default AssetStoreComponent;
