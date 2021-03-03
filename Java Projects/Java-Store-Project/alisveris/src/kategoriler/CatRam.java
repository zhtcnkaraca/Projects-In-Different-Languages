package kategoriler;

import urunler.*;

import java.util.ArrayList;
import java.util.List;

public class CatRam extends BaseCategory{
    @Override
    public List<BaseUrun> getUrunler() {

        List<BaseUrun> urunList = new ArrayList<>();
        urunList.add(new UrCorsairram());
        urunList.add(new UrGskillram());
        urunList.add(new UrKingstoneram());

        return urunList;
    }

    @Override
    public String getName() {
        return "Ram";
    }
}
