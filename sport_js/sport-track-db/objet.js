#!/usr/bin/node
const fs = require('fs');
const R = 6378.137

class CalculDistance {

    constructor() {
        this.dist = 0;
    }

    toRad(angle) {
        return (Math.PI * angle / 180);
    }
    
    calculDistance2PointsGPS(lat1, long1, lat2, long2) {
        return ((R * Math.acos(Math.sin(this.toRad(lat2)) * Math.sin(this.toRad(lat1)) + Math.cos(this.toRad(lat2)) * Math.cos(this.toRad(lat1)) * Math.cos(this.toRad(long2-long1)))) * 1000);
    }
    
    calculDistanceTrajet(act) {
        for (let i = 0; i < act.data.length - 1; i++) {
            this.dist += this.calculDistance2PointsGPS(act.data[i].latitude, act.data[i].longitude, act.data[i+1].latitude, act.data[i+1].longitude);
        }
        return (this.dist);
    }
}

let act = require('./test.json');
let obj = new CalculDistance();

console.log(obj.calculDistanceTrajet(act));