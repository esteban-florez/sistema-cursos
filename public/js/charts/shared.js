export const URL = document.querySelector('#serialized').dataset.charts

export function getBarsDatasets(data) {
    return Object.entries(data)
        .map(([key, value], i) => {
            const baseData = [0, 0, 0, 0]
            baseData[i] = value

            return {
                label: key,
                data: baseData, 
            }
        })
}

export function getPieDatasets(data) {
    return [
        {
            label: '%',
            data: Object.values(data)
        }
    ]
}
