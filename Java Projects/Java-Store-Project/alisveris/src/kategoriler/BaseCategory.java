package kategoriler;

import urunler.BaseUrun;

import java.util.List;

public abstract class BaseCategory {

    public abstract List<BaseUrun> getUrunler();

    public abstract String getName();

}
