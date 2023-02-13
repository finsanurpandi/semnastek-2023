@extends('layouts.notus')

@section('title', 'Author Dashboard')

@section('cardtitle', 'Articles by Author')

@section('content')
<div class="container px-4 md:px-10 mx-auto">
    <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
        Regular
    </button>
    <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
        Small
      </button>
<!-- Small Input -->
<div class="mb-3 pt-0">
    <input type="text" placeholder="Small Input" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full"/>
  </div>
  <!-- Regular Input -->
  <div class="mb-3 pt-0">
    <input type="text" placeholder="Regular Input" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full"/>
  </div>
  <!-- Large Input -->
  <div class="mb-3 pt-0">
    <input type="text" placeholder="Large Input" class="px-3 py-4 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-base border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full"/>
  </div>
</div>
    <!-- Projects table -->
                  <table
                    class="items-center w-full bg-transparent border-collapse"
                  >
                    <thead>
                      <tr>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Project
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Budget
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Status
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Users
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Completion
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        ></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                        >
                          <img
                            src="../../assets/img/bootstrap.jpg"
                            class="h-12 w-12 bg-white rounded-full border"
                            alt="..."
                          />
                          <span class="ml-3 font-bold text-blueGray-600">
                            Argon Design System
                          </span>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          $2,500 USD
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <i class="fas fa-circle text-orange-500 mr-2"></i>
                          pending
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <div class="flex">
                            <img
                              src="../../assets/img/team-1-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow"
                            />
                            <img
                              src="../../assets/img/team-2-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                            <img
                              src="../../assets/img/team-3-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                            <img
                              src="../../assets/img/team-4-470x470.png"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                          </div>
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <div class="flex items-center">
                            <span class="mr-2">60%</span>
                            <div class="relative w-full">
                              <div
                                class="overflow-hidden h-2 text-xs flex rounded bg-red-200"
                              >
                                <div
                                  style="width: 60%"
                                  class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"
                                ></div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                          <a
                            href="#pablo"
                            class="text-blueGray-500 block py-1 px-3"
                            onclick="openDropdown(event,'table-light-1-dropdown')"
                          >
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div
                            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="table-light-1-dropdown"
                          >
                            <a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Action</a
                            ><a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Another action</a
                            ><a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Something else here</a
                            >
                            <div
                              class="h-0 my-2 border border-solid border-blueGray-100"
                            ></div>
                            <a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Seprated link</a
                            >
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                        >
                          <img
                            src="../../assets/img/angular.jpg"
                            class="h-12 w-12 bg-white rounded-full border"
                            alt="..."
                          />
                          <span class="ml-3 font-bold text-blueGray-600">
                            Angular Now UI Kit PRO
                          </span>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          $1,800 USD
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <i class="fas fa-circle text-emerald-500 mr-2"></i>
                          completed
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <div class="flex">
                            <img
                              src="../../assets/img/team-1-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow"
                            />
                            <img
                              src="../../assets/img/team-2-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                            <img
                              src="../../assets/img/team-3-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                            <img
                              src="../../assets/img/team-4-470x470.png"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                          </div>
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <div class="flex items-center">
                            <span class="mr-2">100%</span>
                            <div class="relative w-full">
                              <div
                                class="overflow-hidden h-2 text-xs flex rounded bg-emerald-200"
                              >
                                <div
                                  style="width: 100%"
                                  class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500"
                                ></div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                          <a
                            href="#pablo"
                            class="text-blueGray-500 block py-1 px-3"
                            onclick="openDropdown(event,'table-light-2-dropdown')"
                          >
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div
                            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="table-light-2-dropdown"
                          >
                            <a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Action</a
                            ><a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Another action</a
                            ><a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Something else here</a
                            >
                            <div
                              class="h-0 my-2 border border-solid border-blueGray-100"
                            ></div>
                            <a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Seprated link</a
                            >
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                        >
                          <img
                            src="../../assets/img/sketch.jpg"
                            class="h-12 w-12 bg-white rounded-full border"
                            alt="..."
                          />
                          <span class="ml-3 font-bold text-blueGray-600">
                            Black Dashboard Sketch
                          </span>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          $3,150 USD
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <i class="fas fa-circle text-red-500 mr-2"></i>
                          delayed
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <div class="flex">
                            <img
                              src="../../assets/img/team-1-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow"
                            />
                            <img
                              src="../../assets/img/team-2-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                            <img
                              src="../../assets/img/team-3-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                            <img
                              src="../../assets/img/team-4-470x470.png"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                          </div>
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <div class="flex items-center">
                            <span class="mr-2">73%</span>
                            <div class="relative w-full">
                              <div
                                class="overflow-hidden h-2 text-xs flex rounded bg-red-200"
                              >
                                <div
                                  style="width: 73%"
                                  class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"
                                ></div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                          <a
                            href="#pablo"
                            class="text-blueGray-500 block py-1 px-3"
                            onclick="openDropdown(event,'table-light-3-dropdown')"
                          >
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div
                            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="table-light-3-dropdown"
                          >
                            <a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Action</a
                            ><a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Another action</a
                            ><a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Something else here</a
                            >
                            <div
                              class="h-0 my-2 border border-solid border-blueGray-100"
                            ></div>
                            <a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Seprated link</a
                            >
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                        >
                          <img
                            src="../../assets/img/react.jpg"
                            class="h-12 w-12 bg-white rounded-full border"
                            alt="..."
                          />
                          <span class="ml-3 font-bold text-blueGray-600">
                            React Material Dashboard
                          </span>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          $4,400 USD
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <i class="fas fa-circle text-teal-500 mr-2"></i> on
                          schedule
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <div class="flex">
                            <img
                              src="../../assets/img/team-1-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow"
                            />
                            <img
                              src="../../assets/img/team-2-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                            <img
                              src="../../assets/img/team-3-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                            <img
                              src="../../assets/img/team-4-470x470.png"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                          </div>
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <div class="flex items-center">
                            <span class="mr-2">90%</span>
                            <div class="relative w-full">
                              <div
                                class="overflow-hidden h-2 text-xs flex rounded bg-teal-200"
                              >
                                <div
                                  style="width: 90%"
                                  class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-teal-500"
                                ></div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                          <a
                            href="#pablo"
                            class="text-blueGray-500 block py-1 px-3"
                            onclick="openDropdown(event,'table-light-4-dropdown')"
                          >
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div
                            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="table-light-4-dropdown"
                          >
                            <a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Action</a
                            ><a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Another action</a
                            ><a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Something else here</a
                            >
                            <div
                              class="h-0 my-2 border border-solid border-blueGray-100"
                            ></div>
                            <a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Seprated link</a
                            >
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                        >
                          <img
                            src="../../assets/img/vue.jpg"
                            class="h-12 w-12 bg-white rounded-full border"
                            alt="..."
                          />
                          <span class="ml-3 font-bold text-blueGray-600">
                            React Material Dashboard
                          </span>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          $2,200 USD
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <i class="fas fa-circle text-emerald-500 mr-2"></i>
                          completed
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <div class="flex">
                            <img
                              src="../../assets/img/team-1-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow"
                            />
                            <img
                              src="../../assets/img/team-2-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                            <img
                              src="../../assets/img/team-3-800x800.jpg"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                            <img
                              src="../../assets/img/team-4-470x470.png"
                              alt="..."
                              class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4"
                            />
                          </div>
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          <div class="flex items-center">
                            <span class="mr-2">100%</span>
                            <div class="relative w-full">
                              <div
                                class="overflow-hidden h-2 text-xs flex rounded bg-emerald-200"
                              >
                                <div
                                  style="width: 100%"
                                  class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500"
                                ></div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                          <a
                            href="#pablo"
                            class="text-blueGray-500 block py-1 px-3"
                            onclick="openDropdown(event,'table-light-5-dropdown')"
                          >
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div
                            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="table-light-5-dropdown"
                          >
                            <a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Action</a
                            ><a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Another action</a
                            ><a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Something else here</a
                            >
                            <div
                              class="h-0 my-2 border border-solid border-blueGray-100"
                            ></div>
                            <a
                              href="#pablo"
                              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                              >Seprated link</a
                            >
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
    

@stop