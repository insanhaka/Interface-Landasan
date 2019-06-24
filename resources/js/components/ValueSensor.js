import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

/*const divStyle = {
    marginLeft: '10'
};*/

export default class ValueSensor extends Component {

    
    constructor(props) {
      super(props);
      this.state = {
        sensorlevel:[],
        sensorlain:[],
        nilaibatasan:[],
        persentase:[],

        now:[],

        baris1:[],
        baris2:[],

        batasnormal:[],
        batasbahaya:[],

        sensordebit:[],
        sensorresistiv:[],
        kondisidebit: [],
        kondisiresistiv: [],
      }
    }

    componentDidMount() {
      this.getDataSemua();
      this.getTreshold();
      this.getAlarm()
      this.soundAlert();
    }

    getDataSemua() {
      var t = this;
      setInterval(()=>{
        var now = Math.floor(new Date().getTime()/1000) + 3 * 8397;
        t.setState({now});
        //console.log(now);
        axios.get('/api/data-sensor')
        .then(sensor=> {
            var sensorlevel = sensor.data.datasensor;
            var sensorlain = sensor.data.nilaisensor;
            t.setState({sensorlevel});
            t.setState({sensorlain});
            //console.log(sensorlevel);
            //console.log(sensorlain);
            var baris1 = sensorlevel.slice(0, 7);
            var baris2 = sensorlevel.slice(7, 14);
            t.setState({baris1});
            t.setState({baris2});
            //console.log(baris1);

            //coding untuk indikator
            /*for (var i in sensorlevel) {
              if (sensorlevel[i].ip == "192.168.1.11") {
                var sensor11
              }
            }*/

            //Coding sensor resistiv dan Debit
            for (var n in sensorlain) {
              if (sensorlain[n].ip == "192.168.1.31") {
                var sensordebit = sensorlain[n].level;
                var waktudebit = sensorlain[n].waktu;
                t.setState({sensordebit});
                //console.log(sensordebit);

                if (waktudebit < now) {
                  t.setState({kondisidebit : "OFF"});
                  t.setState({sensordebit : "-"});
                }else{
                  t.setState({kondisidebit : "ON"});
                }

              }else{
                var sensorresistiv = sensorlain[n].level;
                var wakturesistiv = sensorlain[n].waktu;
                t.setState({sensorresistiv});
                //console.log(sensorresistiv);

                if (wakturesistiv < now) {
                  t.setState({kondisiresistiv : "OFF"});
                  t.setState({sensorresistiv : "-"});
                }else{
                  t.setState({kondisiresistiv : "ON"});
                }
              }
            }
            
        })
      },1200);
    }

    getTreshold(){
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

    getAlarm(){
      var t = this;
      axios.get('/api/alarm')
      .then(res => {
        var alarm = res.data.alarm;
        for (var i = 0; i < alarm.length; i++) {
            var persentase = 14 * alarm[i].persentase / 100;
            t.setState({persentase});
            console.log(persentase);
        }
      })
    }

    playSound() {
      var audio = document.createElement("audio");
          audio.src = "assets/alarmBahaya.mp3";
          audio.loop = false;
          audio.play();
          //suara.muted = false;
      /*if(sound) {
        var audio = new Audio(sound);
        audio.load();
        audio.play();
        audio.loop = false;
        //audio.muted = false;
      }*/
    }
    

    soundAlert() { 
     var t = this;
      setInterval(()=>{
        //Kode Menghitung Sensor yang mendeteksi WASPADA
        var countsb = {};
        var countsw = {};
        var countsn = {};
        for (var n = 0; n < t.state.sensorlevel.length; n++){
          var num = t.state.sensorlevel[n].level;
          if(num >= t.state.batasbahaya){
            countsb[num] = countsb[num] ? countsb[num] + 1 : 1;
          }else if(num > t.state.batasnormal){
            countsw[num] = countsw[num] ? countsw[num] + 1 : 1;
          }else{
            countsn[num] = countsn[num] ? countsn[num] + 1 : 1;
          }
        }

        var coba1 = 0;
            for (var tambah of Object.values(countsb)){
              coba1 += tambah;
            }
        var coba2 = 0;
            for (var hitung of Object.values(countsw)){
              coba2 += hitung;
            }
        var coba3 = 0;
            for (var sum of Object.values(countsn)){
              coba3 += sum;
            }

        //console.log(countsb);
        //console.log(coba1);

        if (coba1 > t.state.persentase){
          t.playSound();
        }else {
          console.log("aman-aman ajah");
        }

      }, 3000);
    }


    render() {

      // Menampilkan level air IP 11 - 17
      const levelbaris1 = this.state.baris1.map((data)=>{
        if (data.waktu < this.state.now) {
          return (
            <td key={data.ip}>-</td>
          )
        }else{
          return (
            <td key={data.ip}>{data.level}</td>
          )
        }
      });
      // Menampilkan level air IP 21 - 27
      const levelbaris2 = this.state.baris2.map((data)=>{
        if (data.waktu < this.state.now) {
          return (
            <td key={data.ip}>-</td>
          )
        }else{
          return (
            <td key={data.ip}>{data.level}</td>
          )
        }
      });

      // Menampilkan kondisi Sensor IP 11 - 17
      const kondisibaris1 = this.state.baris1.map((data)=>{
        if (data.waktu < this.state.now) {
          return (
            <td key={data.ip}><button className="OFF">OFF</button></td>
          )
        }else{
          return (
            <td key={data.ip}><button className="ON">ON</button></td>
          )
        }
      });
      // Menampilkan Kondisi Sensor IP 21 - 27
      const kondisibaris2 = this.state.baris2.map((data)=>{
        if (data.waktu < this.state.now) {
          return (
            <td key={data.ip}><button className="OFF">OFF</button></td>
          )
        }else{
          return (
            <td key={data.ip}><button className="ON">ON</button></td>
          )
        }
      });

      // Menampilkan Status level air IP 11 - 17
      const statusbaris1 = this.state.baris1.map((data)=>{
        if (data.waktu < this.state.now) {
          return (
            <td key={data.ip}><button className="StatusOff">---</button></td>
          )
        }else{
          if (data.level >= this.state.batasbahaya) {
            return (
              <td key={data.ip}><button className="BAHAYA">BAHAYA</button></td>
            )
          }else if (data.level > this.state.batasnormal) {
            return (
              <td key={data.ip}><button className="WASPADA">WASPADA</button></td>
            )
          }else{
            return (
              <td key={data.ip}><button className="NORMAL">NORMAL</button></td>
            )
          }
        }
      });
      // Menampilkan Status level air IP 21 - 27
      const statusbaris2 = this.state.baris2.map((data)=>{
        if (data.waktu < this.state.now) {
          return (
            <td key={data.ip}><button className="StatusOff">---</button></td>
          )
        }else{
          if (data.level >= this.state.batasbahaya) {
            return (
              <td key={data.ip}><button className="BAHAYA">BAHAYA</button></td>
            )
          }else if (data.level > this.state.batasnormal) {
            return (
              <td key={data.ip}><button className="WASPADA">WASPADA</button></td>
            )
          }else{
            return (
              <td key={data.ip}><button className="NORMAL">NORMAL</button></td>
            )
          }
        }
      });

      // Menampilkan Indikator sensor IP 11 - 17
      const indikatorbaris1 = this.state.baris1.map((data)=>{
        if (data.waktu < this.state.now) {
          return (
            <div className="col-1" key={data.ip}>
              <p> {data.ip.split(".").pop()}</p>
              <div className="indikatoroff"></div>
            </div>
          )
        }else{
          if (data.level >= this.state.batasbahaya) {
            return (
              <div className="col-1" key={data.ip}>
                <p> {data.ip.split(".").pop()}</p>
                <div className="indikatorbahaya"></div>
              </div>
            )
          }else if (data.level > this.state.batasnormal) {
            return (
              <div className="col-1" key={data.ip}>
                <p> {data.ip.split(".").pop()}</p>
                <div className="indikatorwaspada"></div>
              </div>
            )
          }else{
            return (
              <div className="col-1" key={data.ip}>
                <p> {data.ip.split(".").pop()}</p>
                <div className="indikatornormal"></div>
              </div>
            )
          }
        }
      });
      // Menampilkan Indikator sensor IP 21 - 27
      const indikatorbaris2 = this.state.baris2.map((data)=>{
        if (data.waktu < this.state.now) {
          return (
            <div className="col-1" key={data.ip}>
              <p> {data.ip.split(".").pop()}</p>
              <div className="indikatoroff"></div>
            </div>
          )
        }else{
          if (data.level >= this.state.batasbahaya) {
            return (
              <div className="col-1" key={data.ip}>
                <p> {data.ip.split(".").pop()}</p>
                <div className="indikatorbahaya"></div>
              </div>
            )
          }else if (data.level > this.state.batasnormal) {
            return (
              <div className="col-1" key={data.ip}>
                <p> {data.ip.split(".").pop()}</p>
                <div className="indikatorwaspada"></div>
              </div>
            )
          }else{
            return (
              <div className="col-1" key={data.ip}>
                <p> {data.ip.split(".").pop()}</p>
                <div className="indikatornormal"></div>
              </div>
            )
          }
        }
      });


        return (
            <React.Fragment>
            <section className="dota"> 
              <div className="container">
                <div className="row justify-content-around">
                  {indikatorbaris1}
                </div>
              </div>
            </section>
            <section className="dotb"> 
              <div className="container">
                <div className="row justify-content-around" style={{ marginLeft: 10 }}>
                  {indikatorbaris2}
                </div>
              </div>
            </section>
            <div className="tabel table-borderless">
                    <div className="row">
                          <div className="col-9">
                              <div className="row">
                                  <div className="col-12">
                                      <form style={{fontSize: 14}}>
                                        <table className="table table-sm">
                                          <tbody>
                                            <tr className="sebelas">
                                              <th>ID SENSOR</th>
                                              <td> Sensor 11</td>
                                              <td> Sensor 12</td>
                                              <td> Sensor 13</td>
                                              <td> Sensor 14</td>
                                              <td> Sensor 15</td>
                                              <td> Sensor 16</td>
                                              <td> Sensor 17</td>
                                            </tr>
                                            <tr className="duabelas">
                                              <th>Kondisi ON/OFF</th>
                                              {kondisibaris1}
                                            </tr>
                                            <tr className="tigabelas">
                                              <th>Water Level (mm)</th>
                                              {levelbaris1}
                                            </tr>
                                            <tr className="empatbelas">
                                              <th>Status</th>
                                              {statusbaris1}
                                            </tr>
                                          </tbody>
                                        </table>
                                      </form>
                                  </div>
                                  <div className="col-12">
                                        <form style={{fontSize: 14}}>
                                          <table className="table table-sm">
                                            <tbody>
                                              <tr className="sebelas">
                                                <th>ID SENSOR</th>
                                                <td> Sensor 21</td>
                                                <td> Sensor 22</td>
                                                <td> Sensor 23</td>
                                                <td> Sensor 24</td>
                                                <td> Sensor 25</td>
                                                <td> Sensor 26</td>
                                                <td> Sensor 27</td>
                                              </tr>
                                              <tr className="duabelas">
                                                <th>Kondisi ON/OFF</th>
                                                {kondisibaris2}
                                              </tr>
                                              <tr className="tigabelas">
                                                <th>Water Level (mm)</th>
                                                {levelbaris2}
                                              </tr>
                                              <tr className="empatbelas">
                                                <th>Status</th>
                                                {statusbaris2}
                                              </tr>
                                            </tbody>
                                          </table>
                                        </form>
                                  </div>
                              </div>
                          </div>
                          <div className="col-3">
                              <form style={{fontSize: 14}}>
                                <table className="table table-sm">
                                  <tbody>
                                    <tr className="sebelas">
                                      <th style={{ paddingLeft: 20, paddingTop: 15 }}>SENSOR</th>
                                      <th>Kondisi ON/OFF</th>
                                      <th>Nilai Pengukuran</th>
                                    </tr>
                                    <tr className="duabelas">
                                      <td style={{ paddingLeft: 20 }}>Debit Air</td>
                                      <td><button className={this.state.kondisidebit}>{this.state.kondisidebit}</button></td>
                                      <td className="debit">{this.state.sensordebit}</td>
                                    </tr>
                                    <tr className="tigabelas">
                                      <td style={{ paddingLeft: 20 }}>Resistiviti</td>
                                      <td><button className={this.state.kondisiresistiv}>{this.state.kondisiresistiv}</button></td>
                                      <td className="resistiv">{this.state.sensorresistiv}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </form>
                          </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

if (document.getElementById('valuesensor')) {
    ReactDOM.render(<ValueSensor />, document.getElementById('valuesensor'));
}
