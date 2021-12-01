import "filter_threedviewer/threed-viewer";

export const init = () => {
    const stlNodes = document.querySelectorAll(':not(threed-model) > a[href*=".stl"]');
    stlNodes.forEach((el) => {
        const addr = new URL(el.getAttribute('href'));
        let width = addr.searchParams.get('width');
        let height = addr.searchParams.get('height');
        if (!height || height == '') {
            height = "300px";
        }
        const viewer = document.createElement('threed-viewer');
        viewer.setAttribute('controls', '');
        viewer.setAttribute('help', '');
        viewer.setAttribute('toolbar', '');
        viewer.setAttribute('axis-helper', '');
        if (!!width && width != '') {
            viewer.setAttribute('width', width);
        }
        if (!!height && height != '') {
            viewer.setAttribute('height', height);
        }
        const model = document.createElement('threed-model');
        model.setAttribute('scale', '');
        model.setAttribute('center', '');
        model.appendChild(el.cloneNode());
        viewer.appendChild(model);
        el.parentNode.replaceChild(viewer, el);
    });
};
