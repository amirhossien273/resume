import React, { useState } from "react";
import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Card, CardBody, Table } from "reactstrap";
import { featchFindOutput } from "../../redux/findOutput/findoutput";
import { Link } from "react-router-dom";
import { FileText, Download, Printer } from "react-feather"
import ShowOptionModel from "./ShowOptionModelComponent";
import ShowModelComponent from "./ShowModelComponent";
import { handelDownload } from "../../services/downloadXLXS";

const FindOutPutListCommponent = () => {   

  const { findOutput } = useSelector( (s) => s);
  const dispatch = useDispatch();

  useEffect( () => {

    dispatch(featchFindOutput());
  }, []);

  const [isSelectTravelModalOpen, setIsSelectTravelModalOpen] = useState(false);
  const [isSelectTreatModalOpen, setIsSelectTreatModalOpen] = useState(false);
  const [isAssetOption, setAssetOption] = useState([]);
  const [isTreatOption, setTreatOption] = useState([]);

  const handleSelectTravelButtonClick = (assetOption) => {
    setIsSelectTravelModalOpen(true);
    setAssetOption(assetOption);
  };

  const handleSelectTreatButtonClick = (treatOption) => {
    setIsSelectTreatModalOpen(true);
    setTreatOption(treatOption);
  };

  const toggleSelectTravelModal = () => {
    setIsSelectTravelModalOpen(!isSelectTravelModalOpen);
  };

  const toggleSelectTreatModal = () => {
    setIsSelectTreatModalOpen(!isSelectTreatModalOpen);
  };

  const xlsx = () => {
    const data = [['ردیف', 'نام قرار گاه / معاونت', 'نوع تهدید', 'نوع آسیب پذیری', 'نام دارایی', ]];

    findOutput.data.map( (itemAsset, indexAsset) => {

        data.push([indexAsset,itemAsset.organ.name,itemAsset.name, itemAsset.threat.name, itemAsset.threat.asset.name])
    });

    handelDownload(data, "showDataAsset");
  }

  return (
    <>
    <Card className="card col-12 m-auto p-1">
      <CardBody >
       <div className="col-md-12 p-1">
         {/* <Link to="/pdf-final-output" className="btn btn-sm btn-bitbucket">خروجی به صورت pdf <Printer /></Link> */}
         <button onClick={xlsx} className="btn btn-sm btn-bitbucket ms-1">خروجی به صورت اکسل <Download /></button>
       </div>
       <div className="col-md-12 p-1">
         
       </div>
       <Table striped bordered hover>
          <thead>
            <tr>
              <th>ردیف</th>
              <th>نام قرار گاه / معاونت</th>
              <th>نوع تهدید</th>
              <th>نوع آسیب پذیری</th>
              <th>نام دارایی</th>
              <th>پیامد ها</th>
            </tr>
          </thead>
          <tbody>
            {findOutput.data.map( (itme, index) => {
              // console.log("itme itme itme itme: ", itme);
               return(
                <tr key={index}>
                    <td>{index + 1}</td>
                    <td>{itme.organ.name}</td>
                    <td>
                      {itme.name}
                        <button  onClick={() => {
                        handleSelectTreatButtonClick(itme.vulnerabilityOptions);
                      }} className="btn"><FileText size={20} /></button>
                    </td>
                    <td>
                      {itme.threat.name}
                      <button  onClick={() => {
                      handleSelectTreatButtonClick(itme.threat.threatOptions);
                    }} className="btn"><FileText size={20} /></button>
                    </td>
                    <td>
                      {itme.threat.asset.name}
                      <button  onClick={() => {
                      handleSelectTreatButtonClick(itme.threat.asset.assetOption);
                    }} className="btn"><FileText size={20} /></button>
                    </td>
                    <td><button  onClick={() => {
                      handleSelectTravelButtonClick(itme.ranks);
                    }} className="btn"><FileText size={20} /></button></td>
                </tr>
               )
            })}
          </tbody>
        </Table>
      </CardBody>
    </Card>
    <ShowOptionModel
        isOpen={isSelectTravelModalOpen}
        assetOption={isAssetOption}
        toggleModal={toggleSelectTravelModal}
      />

    <ShowModelComponent
        isOpen={isSelectTreatModalOpen}
        treatOption={isTreatOption}
        toggleModal={toggleSelectTreatModal}
    />
    </>
  );
};

export default FindOutPutListCommponent;
