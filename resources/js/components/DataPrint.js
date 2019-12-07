import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import DatePicker from "react-datepicker";

import "react-datepicker/dist/react-datepicker.css";


export default class DataPrint extends Component {

    
    constructor(props) {
      super(props);
      this.state = {
        sensorlevel:[],
        nilaibatasan:[],

        startDate: new Date(),
        endDate: new Date(),

        now:[],

        batasnormal:[],
        batasbahaya:[],

        datasensor: [],

        waktuawal: [],
        waktuakhir: [],

        //datawaktu: []
      };
      this.handleChangeStart = this.handleChangeStart.bind(this);
      this.handleChangeEnd = this.handleChangeEnd.bind(this);
    }

    componentDidMount() {
      this.getDataSemua();
      this.getTreshold();
      //this.getDataPilihan();
    }

    getDataSemua() {
      var t = this;
      setInterval(()=>{
        var now = Math.floor(new Date().getTime()/1000) + 3 * 8397;
        t.setState({now});
        //console.log(now);
        axios.get('/api/data-print')
        .then(sensor=> {
            var sensorlevel = sensor.data.dataprint;
            t.setState({sensorlevel});
            //console.log(sensorlevel);
        })
      },1000);
    }

    getTreshold() {
      var t = this;
      axios.get('/api/batasan')
      .then(res => {
        var nilaibatasan = res.data.batasan;
        t.setState({nilaibatasan});
        //console.log(nilaibatasan);
        for (var i = 0; i < nilaibatasan.length; i++) {
              var batasnormal = nilaibatasan[i].normal;
              var batasbahaya = nilaibatasan[i].bahaya;
              //console.log(batasnormal);
              t.setState({batasnormal});
              //console.log(batasbahaya);
              t.setState({batasbahaya});
            }
      })
    }

    handleChangeStart(date) {
      this.setState({
        startDate: date
      });
    }

    handleChangeEnd(date) {
      this.setState({
        endDate: date
      });
    }

    handleSubmit(event) {
      var t = this;
      var waktuawal = t.state.startDate.getTime()/1000 + 3 * 8400;
      t.setState({waktuawal});
      var waktuakhir = t.state.endDate.getTime()/1000 + 3 * 8400;
      t.setState({waktuakhir});

      console.log('waktu awal : ', waktuawal);
      console.log('waktu akhir : ', waktuakhir);

        const datasensor = t.state.sensorlevel
        .filter((data)=>{
          var datawaktu = Date.parse(data.waktu)/1000 + 3 * 8400;
          console.log('Data Waktu', datawaktu);
          //return data.waktu.indexOf(this.getWaktupilihan) >=0
          return (datawaktu > waktuawal && datawaktu < waktuakhir)
        })
        .map((data, index)=>{
          if (data.level >= this.state.batasbahaya) {
            return (
              <tr key={data.id}>
                <th scope="row">{index + 1}</th>
                  <td>{data.waktu}</td>
                  <td>{data.level}</td>
                  <td>{data.ip}</td>
                  <td>Bahaya</td>
              </tr>
            )
          }else if (data.level > this.state.batasnormal) {
            return (
              <tr key={data.id}>
                <th scope="row">{index + 1}</th>
                  <td>{data.waktu}</td>
                  <td>{data.level}</td>
                  <td>{data.ip}</td>
                  <td>Waspada</td>
              </tr>
            )
          }else{
            return (
              <tr key={data.id}>
                <th scope="row">{index + 1}</th>
                  <td>{data.waktu}</td>
                  <td>{data.level}</td>
                  <td>{data.ip}</td>
                  <td>Normal</td>
              </tr>
            )
          }
        });

      this.setState({datasensor});
      event.preventDefault();
    }


    render() {

        return (
            <React.Fragment>
            <div className="datasheet">
              <div className="container">
                <h3>Data Pengukuran Ketinggian Air Pada Landasan Pacu</h3>
                <hr style={{borderWidth: 2, borderColor: '#aaa', marginBottom: 30}} />

                <form>
                <label>Ambil data mulai dari :</label> <br />
                  <DatePicker
                      selected={this.state.startDate}
                      onChange={this.handleChangeStart}
                      showTimeSelect
                      timeFormat="HH:mm"
                      timeIntervals={1}
                      dateFormat="d, MMMM yyyy HH:mm"
                      timeCaption="time"
                  />
                <label style={{marginRight: 10, marginLeft: 10}}>Sampai dengan</label>
                  <DatePicker
                      selected={this.state.endDate}
                      onChange={this.handleChangeEnd}
                      showTimeSelect
                      timeFormat="HH:mm"
                      timeIntervals={1}
                      dateFormat="d, MMMM yyyy HH:mm"
                      timeCaption="time"
                  />
                <button onClick={this.handleSubmit.bind(this)} value="submit" className="btn btn-primary mb-2" style={{marginLeft: 30}}>Submit</button>
                </form>
                <hr style={{borderWidth: 1, borderColor: '#aaa', marginBottom: 30}} />
                
                <table className="table table-sm text-center">
                  <thead className="thead-light">
                    <tr>
                      <th scope="col">NO</th>
                      <th scope="col">Waktu</th>
                      <th scope="col">Ketinggian Air (mm)</th>
                      <th scope="col">IP Sensor</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    {this.state.datasensor}
                  </tbody>
                </table>
              </div>
            </div>
            </React.Fragment>
        );
    }
}

if (document.getElementById('dataprint')) {
    ReactDOM.render(<DataPrint />, document.getElementById('dataprint'));
}
