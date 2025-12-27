import React, { useState } from "react";
import { Card, CardBody, Table, Button } from "reactstrap";
import ShowAssetOptionModel from "./ShowAssetOptionModelComponent";
import { handelDownload } from "../../services/downloadXLXS";
import { BarChart2, Download, Printer } from "react-feather";
import { Link } from "react-router-dom";

const AssetListComponent = (params) => {

  const [isSelectTravelModalOpen, setIsSelectTravelModalOpen] = useState(false);
  const [isAssetOption, setAssetOption] = useState([]);

  const handleSelectTravelButtonClick = (assetOption) => {
    setIsSelectTravelModalOpen(true);
    setAssetOption(assetOption);
  };

  const toggleSelectTravelModal = () => {
    setIsSelectTravelModalOpen(!isSelectTravelModalOpen);
  };

  const xlsx = () => {
    const data = [['ردیف', 'نام دارایی', 'نام کاربر']];

    params.assets.map( (itemAsset, indexAsset) => {

        data.push([indexAsset + 1 ,itemAsset.name, `${itemAsset.user.name}`])
    });

    handelDownload(data, "showDataAsset");
  }
  return (
    <>
    <Card className="card col-12 m-auto p-1">
      <CardBody >
        <div className="col-md-12 p-1">
         <button onClick={xlsx} className="btn btn-sm btn-bitbucket ">خروجی اکسل از دارایی <Download /></button>
        </div>
       <Table striped bordered hover>
          <thead>
            <tr>
              <th>ردیف</th>
              <th>نام</th>
              <th>ایجاد شده توسط</th>
              {/* <th>#</th> */}
            </tr>
          </thead>
          <tbody>
            {params.assets.map( (item, index) => {
              return(
                <tr key={index}>
                <td>{index + 1}</td>
                <td>{item.name}</td>
                <td>{item.user.name} {item.user.lastName}</td>
                {/* <td><button className="btn btn-sm btn-dark" 
                    onClick={() => {
                      handleSelectTravelButtonClick(item.assetOption);
                    }}
                >نمایش ارزیابی دارایی</button></td> */}
              </tr>
              )
            })}
          </tbody>
        </Table>
      </CardBody>
      <ShowAssetOptionModel
        isOpen={isSelectTravelModalOpen}
        assetOption={isAssetOption}
        toggleModal={toggleSelectTravelModal}
      />
    </Card>
    </>
  );
};

export default AssetListComponent;
