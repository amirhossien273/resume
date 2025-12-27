import React from "react";
import { Page, Text, View, Document, StyleSheet, PDFViewer, Font } from '@react-pdf/renderer';
import font from '../../assets/IranYekan.ttf'

const PdfFinalOutPutComponent = () => {

  // Font.register({
    // family: "Roboto",
    // src: '../../../dist/assets/IRANYekanWeb-Light.dc13479e.ttf'
    // src: 'https://cdnjs.cloudflare.com/ajax/libs/ink/3.1.10/fonts/Roboto/roboto-light-webfont.ttf'
  // });

  Font.register({
    family: "IRANSansWeb",
    format: "truetype",
    // src: `${process.env.PUBLIC_URL}/static/fonts/IRANSansWeb.ttf`
    // src: 'https://cdn.sqp.ir/Plugins/fonts/IRANYekan/iran-yekan-400.ttf'
    src: font
});
  
  const styles = StyleSheet.create({

    page: {
      flexDirection: 'row',
      backgroundColor: '#ffffff',
      textAlign: 'right',
      writingMode: 'horizontal-tb',
      direction: 'rtl',
      fontFamily: "IRANSansWeb",
    },
    text:{
      borderBottom: "4px solid #ccc",
      marginBottom: "10px",
      marginTop: "10px",
    },
    section: {
      margin: 10,
      padding: 10,
      flexGrow: 1,
      
    }
  });



  return (
    <>
      <PDFViewer style={{width: "100%",height: "1500px"}}>
        <Document>
          <Page size="A4" style={styles.page}>
            <View  style={styles.section}>
            <Text>czxcxzcxzc</Text>
            <Text>
                <table>
                    <thead>
                        <th>
                            <td>#</td>
                            <td>نام</td>
                            <td>ایجاد شده توسط</td>
                        </th>
                    </thead>
                    <tbody>
                        <th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </th>
                    </tbody>
                </table>
                </Text>
            </View>
          </Page>
        </Document>
      </PDFViewer>
    </>
  );
};

export default PdfFinalOutPutComponent;
