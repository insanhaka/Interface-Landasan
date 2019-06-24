import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Tabel extends Component {
    render() {
        return (
            <React.Fragment>
                <div className="tabel table-borderless">
                    <div className="row">
                          <div className="col-9">
                              <div className="row">
                                  <div className="col-12">
                                      <form style={{fontSize: 14}}>
                                        <table className="table table-sm">
                                          <tbody>
                                            <tr id="sebelas">
                                              <th>ID SENSOR</th>
                                              <td> Sensor 11</td>
                                              <td> Sensor 12</td>
                                              <td> Sensor 13</td>
                                              <td> Sensor 14</td>
                                              <td> Sensor 15</td>
                                              <td> Sensor 16</td>
                                              <td> Sensor 17</td>
                                            </tr>
                                            <tr id="duabelas">
                                              <th>Kondisi ON/OFF</th>
                                              <td><button id="ONa"></button></td>
                                              <td><button id="ONb"></button></td>
                                              <td><button id="ONc"></button></td>
                                              <td><button id="ONd"></button></td>
                                              <td><button id="ONe"></button></td>
                                              <td><button id="ONf"></button></td>
                                              <td><button id="ONg"></button></td>
                                            </tr>
                                            <tr id="tigabelas">
                                              <th>Water Level (mm)</th>
                                              <td id="ketinggiana"></td>
                                              <td id="ketinggianb"></td>
                                              <td id="ketinggianc"></td>
                                              <td id="ketinggiand"></td>
                                              <td id="ketinggiane"></td>
                                              <td id="ketinggianf"></td>
                                              <td id="ketinggiang"></td>
                                            </tr>
                                            <tr id="empatbelas">
                                              <th>Status</th>
                                              <td><button id="Statusa"></button></td>
                                              <td><button id="Statusb"></button></td>
                                              <td><button id="Statusc"></button></td>
                                              <td><button id="Statusd"></button></td>
                                              <td><button id="Statuse"></button></td>
                                              <td><button id="Statusf"></button></td>
                                              <td><button id="Statusg"></button></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </form>
                                  </div>
                                  <div className="col-12">
                                        <form style={{fontSize: 14}}>
                                          <table className="table table-sm">
                                            <tbody>
                                              <tr id="sebelas">
                                                <th>ID SENSOR</th>
                                                <td> Sensor 21</td>
                                                <td> Sensor 22</td>
                                                <td> Sensor 23</td>
                                                <td> Sensor 24</td>
                                                <td> Sensor 25</td>
                                                <td> Sensor 26</td>
                                                <td> Sensor 27</td>
                                              </tr>
                                              <tr id="duabelas">
                                                <th>Kondisi ON/OFF</th>
                                                <td><button id="ONh"></button></td>
                                                <td><button id="ONi"></button></td>
                                                <td><button id="ONj"></button></td>
                                                <td><button id="ONk"></button></td>
                                                <td><button id="ONl"></button></td>
                                                <td><button id="ONm"></button></td>
                                                <td><button id="ONn"></button></td>
                                              </tr>
                                              <tr id="tigabelas">
                                                <th>Water Level (mm)</th>
                                                <td id="ketinggianh"></td>
                                                <td id="ketinggiani"></td>
                                                <td id="ketinggianj"></td>
                                                <td id="ketinggiank"></td>
                                                <td id="ketinggianl"></td>
                                                <td id="ketinggianm"></td>
                                                <td id="ketinggiann"></td>
                                              </tr>
                                              <tr id="empatbelas">
                                                <th>Status</th>
                                                <td><button id="Statush"></button></td>
                                                <td><button id="Statusi"></button></td>
                                                <td><button id="Statusj"></button></td>
                                                <td><button id="Statusk"></button></td>
                                                <td><button id="Statusl"></button></td>
                                                <td><button id="Statusm"></button></td>
                                                <td><button id="Statusn"></button></td>
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
                                    <tr id="sebelas">
                                      <th style={{ paddingLeft: 20, paddingTop: 15 }}>SENSOR</th>
                                      <th>Kondisi ON/OFF</th>
                                      <th>Nilai Pengukuran</th>
                                    </tr>
                                    <tr id="duabelas">
                                      <td style={{ paddingLeft: 20 }}>Debit Air</td>
                                      <td><button id="ONo"></button></td>
                                      <td id="debit"></td>
                                    </tr>
                                    <tr id="tigabelas">
                                      <td style={{ paddingLeft: 20 }}>Resistiviti</td>
                                      <td><button id="ONp"></button></td>
                                      <td id="resistiv"></td>
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

if (document.getElementById('tabel')) {
    ReactDOM.render(<Tabel />, document.getElementById('tabel'));
}
