
  @extends('host.layout.main-layout') 
  @section('page-style')
   @endsection @section('more-style') @endsection 
   @section('page-title') 
   HOST
   @endsection 
   @section('page-content')
  <div class="col-md-12">
    <div class="portlet light">
      <div class="portlet-body">
        <form action="" class="form-horizontal" method="GET">

          <table>
            <tr>
              <td>
                <img src="{{ url()->asset('assets/backend/img/desktop1.jpg') }}" alt="HTML5 Icon" style="width:480px;height:300px;">
              </td>
              
            
              <td class="text-left col-sm-6 col-md-6">
       
                <h2>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</h2>
                <hr>

                <h4>สถานที่ตั้ง</h4>
                <p>
                  333 ถนนเชิดวุฒากาศ, สนามบินนานาชาติดอนเมือง, กรุงเทพ, ประเทศไทย
                </p>
                <h4>สิ่งอำนวยความสะดวก</h4>
                <p>
                  บริการอินเทอร์เน็ต ฟิตเนส
                </p>
                <h4>บริการที่มีอยู่</h4>
                <p>
                  อาหารเช้า
                </p>
                <a href="{{ url()->to('_host/update') }}" class="btn btn-xs btn-circle green"><i class="fa fa-edit"></i></a> 
               
              </td>


            </tr>
          </table>

        </form>
      </div>
    </div>
  </div>
  </div>
  @endsection @section('page-plugin') @endsection @section('more-script') @endsection