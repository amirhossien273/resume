import axios from "axios";
import App from "../../configs/app";
import { useSelector } from "react-redux";

const url_local = App.server.url;
const user = localStorage.getItem("user-token")
  ? JSON.parse(localStorage.getItem("user-token"))
  : {};

//   accessToken
// tokenType

const Service = {
    
    signin: function(payload) {
        return (
            axios.post(`${url_local}singin`, payload)
            .then(function(response) {
                return response.data;
            })
        );
    },
    signup: function(payload) {
        return (
            axios.post(`${url_local}register`, payload)
            .then(function(response) {
                return response.data;
            })
        );
    },

    auth: function() {
            const userToken = localStorage.getItem("user-token")
            ? JSON.parse(localStorage.getItem("user-token"))
            : {};
        return (
            axios.get(`${url_local}auth`, {headers: { 'Authorization': userToken.tokenType+" "+userToken.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    fetchGroups: function() {
        return (
            axios.get(`${url_local}groups`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    insertGroup: function(payload) {
        return (
            axios.post(`${url_local}groups`, payload, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    insertAsset: function(payload) {
        return (
            axios.post(`${url_local}assets`, payload, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    insertCenter: function(payload) {

        return (
            axios.post(`${url_local}centers`, payload, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );

    },
    fetchAssets: function() {
        return (
            axios.get(`${url_local}assets`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    fetchCenters: function() {
        return (
            axios.get(`${url_local}centers`, { headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    featchSelectAssets: function() {
        return (
            axios.get(`${url_local}asset-option`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    featchSelectThreats: function() {
        return (
            axios.get(`${url_local}threat-option`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    featchSelectVulnerabilities: function() {
        return (
            axios.get(`${url_local}vulnerability-option`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    fetchAssetsGroupID: function(goupID) {
        return (
            axios.get(`${url_local}assets/${goupID}`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    fetchVulnerabilitiesGroupID: function() {
        return (
            axios.get(`${url_local}vulnerabilities`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    insertThreat: function(payload) {
        return (
            axios.post(`${url_local}threats`, payload, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    
    fetchThreats: function() {
        return (
            axios.get(`${url_local}threats`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    insertVulnerability: function(payload) {
        return (
            axios.post(`${url_local}vulnerabilities`, payload, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },
    
    insertRank: function(payload) {
        return (
            axios.post(`${url_local}ranks`, payload, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },
    
    fetchUsers: function() {
        return (
            axios.get(`${url_local}users`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    fetchFindOutput: function() {
        return (
            axios.get(`${url_local}final-output`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    fetchgAssetCountByOrgan: function() {
        return (
            axios.get(`${url_local}asset-by-organ`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    },

    fetchgThreatRisks: function() {
        return (
            axios.get(`${url_local}threat-risks`, {headers: { 'Authorization': user.tokenType+" "+user.accessToken }})
            .then(function(response) {
                return response.data;
            })
        );
    }
}

export default Service;