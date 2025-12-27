import * as XLSX from "xlsx";
import { saveAs } from "file-saver";

export const handelDownload = (data, nameFile) => {

    const wb = XLSX.utils.book_new();
    const ws = XLSX.utils.aoa_to_sheet(data);

    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

    const blob = XLSX.writeFile(wb, `${nameFile}.xlsx`,{bookType: 'xlsx', type: 'file'})

    saveAs(blob, 'tabale-xlsx.xlsx');

}